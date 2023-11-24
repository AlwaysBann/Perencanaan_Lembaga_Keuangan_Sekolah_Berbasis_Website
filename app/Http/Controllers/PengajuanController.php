<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ruangan;
use App\Models\logs;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PengajuanController extends Controller
{
    public function index(Pengajuan $pengajuan)
    {
        $totalPengajuan = DB::select('SELECT CountPengajuan() AS Pengajuan')[0]->Pengajuan;
        $data = [
            "pengajuan" => $pengajuan->all(),
            "jumlahPengajuan" => $totalPengajuan
        ];
        return view("data_pengajuan.index", $data);
    }

    public function create(Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            "ruangan" => $ruangan->all()
        ];
        return view('data_pengajuan.tambah', $data);
    }

    public function store(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'nama_pengaju' => ['required'],
            'nama_pengajuan' => ['required'],
            'tujuan_pengajuan' => ['required'],
            'id_ruangan' => ['required'],
            'nama_item' => ['required'],
            'jumlah_item' => ['required'],
            'spesifikasi_item' => ['required'],
            'harga_satuan' => ['required'],
            'jenis_item' => ['required'],
            'gambar_item' => ['required'],
        ]);

        $data['pembuat'] = Auth::user()->username;

        
        if ($request->hasFile('gambar_item') && $request->file('gambar_item')->isValid()) {
            $foto_file = $request->file('gambar_item');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('Item'), $foto_nama);
            $data['gambar_item'] = $foto_nama;
        }

       if (DB::statement(
            'CALL CreateDataPengajuan(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array_values($data)
        )) {
            return redirect('pengajuan')->with('success', 'Data Pengajuan baru berhasil ditambah');
        } else {
            return redirect()->back();
        }
    }

    public function edit(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            'pengajuan' => $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first(),
            'ruangan' => $ruangan->get()
        ];

        return view('data_pengajuan.edit', $data);
    }

    public function show(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            'pengajuan' => $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first(),
            'ruangan' => $ruangan->join('pengajuan', 'ruangan.id_ruangan', '=', 'pengajuan.id_ruangan')->get()
        ];
        // dd($data);  
        return view('data_pengajuan.detail', $data);
    }

    public function search(Request $request, Pengajuan $pengajuan)
    {
        $search = $request->input('search');

        $data = Pengajuan::where('nama_pengajuan', 'LIKE', "%$search%")
                     ->orWhere('id_pengajuan', 'LIKE', "%$search%")
                     ->orWhere('nama_pengaju', 'LIKE', "%$search%")
                     ->get();

        return view('data_pengajuan.index', ['pengajuan'=>$data]);
    }

    public function logs(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')->get()
        ];

        return view('data_pengajuan.logs', $data);
    }

    public function update(Request $request, ruangan $ruangan, Pengajuan $pengajuan)
    {
        $id_pengajuan = $request->input('id_pengajuan');
        $data = $request->validate(
            [
                'nama_pengaju' => ['required'],
                'nama_pengajuan' => ['required'],
                'tujuan_pengajuan' => ['required'],
                'nama_item' => ['required'],
                'jumlah_item' => ['required'],
                'spesifikasi_item' => ['required'],
                'harga_satuan' => ['required'],
                'jenis_item' => ['required'],
                'id_ruangan' => ['required'],
                'gambar_item' => ['sometimes'],
            ]
        );

        if ($id_pengajuan!== null) {
            if ($request->hasFile('gambar_item')) {
                $foto_file = $request->file('gambar_item');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('item'), $foto_nama);

                $update_data = $pengajuan->where('id_pengajuan', $id_pengajuan)->first();
                File::delete(public_path('item') . '/' . $update_data->file);

                $data['gambar_item'] = $foto_nama;
            }
        }

        if ($data) {
            $pengajuan->where('id_pengajuan', $id_pengajuan)->update($data);
            return redirect('/pengajuan')->with('success', 'Data berhasil diupdate');
        } else {
            return back()->with('error', 'Data Gagal diupdate');
        }

    }



    public function destroy(Pengajuan $pengajuan, Request $request)
    {
        $id_pengajuan = $request->input('id_pengajuan');
        $data = $pengajuan->find($id_pengajuan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        }
    }

    public function cetak(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            'pengajuan' => $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first(),
            'ruangan' => $ruangan->join('pengajuan', 'ruangan.id_ruangan', '=', 'pengajuan.id_ruangan')->get()
        ];
            $pdf = PDF::loadView('data_pengajuan.cetak', $data);
            return $pdf->stream('data_pengajuan.pdf');

    }
}
