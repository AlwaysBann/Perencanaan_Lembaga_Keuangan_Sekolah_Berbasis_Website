<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ruangan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Pengajuan $pengajuan)
    {
        $data = [
            "pengajuan" => $pengajuan->all()
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
        
        $waktu = now()->format('Y-m-d');

        $data['waktu_pengajuan'] = $waktu;
        
        if ($request->hasFile('gambar_item') && $request->file('gambar_item')->isValid()) {
            $foto_file = $request->file('gambar_item');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('Item'), $foto_nama);
            $data['gambar_item'] = $foto_nama;
        }
        
        if ($pengajuan->create($data)) {
            return redirect('pengajuan')->with('success', 'Data Pengajuan baru berhasil ditambah');
        }else {
            return redirect()->back();
        }

        
    }

    public function edit(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            'pengajuan' => $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first(),
            'ruangan' => $ruangan->get()
        ];
        // dd($data);
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
            if ($data) {
                $pengajuan->where('id_pengajuan', $id_pengajuan)->update($data);
                return redirect('/pengajuan')->with('success','Data berhasil diupdate');
            } else {
                return back()->with('error', 'Data Gagal diupdate');
            } 
    }

    

    public function destroy(Pengajuan $pengajuan, Request $request)
    {
        $id_pengajuan = $request->input('id_pengajuan');
        $data = Pengajuan::find($id_pengajuan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        // if ($data) {
        //     $data->delete();    
        //     return response()->json(['success' => true]);
        // } 

        $filePath = public_path('item') . '/' . $data->gambar_item;

        if(file_exists($filePath) && unlink($filePath)) {
            $data->delete();
            return response()->json(['succes' => true]);
        }
        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);

    }

}
                

