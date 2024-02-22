<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\ruangan;
use App\Models\logs;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    /**
     * function dibawah digunakan untuk memanggil halaman list data pengajuan lalu memanggil storedfunction CountPengajuan.
     */
    public function index(Pengajuan $pengajuan)
    {
        $totalPengajuan = DB::select('SELECT CountPengajuan() AS Pengajuan')[0]->Pengajuan;
        $data = [
            "pengajuan" => $pengajuan->all(),
            "jumlahPengajuan" => $totalPengajuan
        ];
        return view("data_pengajuan.index", $data);
    }

    /**
     * function dibawah digunakan untuk memanggil view tambah dan memanggil juga datanya.
     */
    public function create(Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            "ruangan" => $ruangan->all()
        ];
        return view('data_pengajuan.tambah', $data);
    }

    /**
     * function dibawah  digunakan untuk mengupdate data tabel
     */
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
            $foto_nama = base64_encode($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
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

    /**
     * function edit dibawah untuk memanggil view edit dan datanya.
     */
    public function edit(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $data = [
            'pengajuan' => $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first(),
            'ruangan' => $ruangan->get()
        ];

        return view('data_pengajuan.edit', $data);
    }

    /**
     * function dibawah ini digunakan untuk menampilkan detail
     */
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

        return view('data_pengajuan.index', ['pengajuan' => $data]);
    }

    public function logs(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')
                ->get()
                ->filter(function ($log) {
                    return !Str::startsWith($log->logs, 'Akun') && !Str::startsWith($log->logs, 'Tagihan');
                })
        ];

        return view('data_pengajuan.logs', $data);
    }


    /**
     * function dibawah  untuk mengupdate atau mengedit list data obat.
     */

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

        if ($id_pengajuan !== null) {
            if ($request->hasFile('gambar_item')) {
                $foto_file = $request->file('gambar_item');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = base64_encode($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
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


    /**
     * function dibawah digunakan untuk menghapus data pada list.
     */
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

    /**
     * Function cetak() dibawah ini digunakan untuk mencetak pdf list data obat.
     */
    public function cetak(Pengajuan $pengajuan)
    {
        $imageDataArray = [];
        $dataPengajuan = $pengajuan->all();
        $data = [
            'pengajuan' => $dataPengajuan
        ];
        //echo json_encode($dataPengajuan);


        foreach ($dataPengajuan as $dataGambar) {
            if ($dataGambar->gambar_item) {
                /**
                 * $imageData berfungsi menghash file gambar_item yang sudah tersimpan pada folder public/foto.
                 * function file_get_contents() untuk mengambil konten yang sudah di panggil di function public_path
                 */
                $imageData = base64_encode(file_get_contents(public_path('item') . '/' . $dataGambar->gambar_item));
                /**
                 * $imageSrc berfungsi untuk  memanggil path yang ada di variable $imageData.
                 */
                $imageSrc = 'data:image/' . pathinfo($dataGambar->gambar_item, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'pengajuan'];
            }
        }
        //return view('data_pengajuan.cetak', $data);

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('data_pengajuan.cetak', ['pengajuan' => $dataPengajuan, 'imageDataArray' => $imageDataArray]);
        /**
         * kode dibawah untuk mereturn variable pdf dan mengatur nama pdf nya nanti mau jadi apa
         * function stream supaya tidak langsung mendownload file, bisa di lihat terleih dulu sebelum di download
         */
        return $pdf->stream('pengajuan.pdf');
    }

    public function cetakDetail(string $id, Request $request, Pengajuan $pengajuan, ruangan $ruangan)
    {
        $imageDataArray = [];
        $pengajuan = $pengajuan->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_pengajuan', '=', $id)->first();
        $ruangan = $ruangan->join('pengajuan', 'ruangan.id_ruangan', '=', 'pengajuan.id_ruangan')->get();

        // dd($pengajuan);
        if ($pengajuan->gambar_item) {
            $imageData = base64_encode(file_get_contents(public_path('Item') . '/' . $pengajuan->gambar_item));
            $imageSrc = 'data:image/' . pathinfo($pengajuan->gambar_item, PATHINFO_EXTENSION) . ';base64,' . $imageData;

            $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'awok'];
        }

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('data_pengajuan.cetakDetail', ['pengajuan' => $pengajuan, 'imageDataArray' => $imageDataArray, 'ruangan' => $ruangan]);
        return $pdf->stream('data_pengajuanDetail.pdf');
    }
}
