<?php

namespace App\Http\Controllers;

use App\Models\perencanaan;
use App\Models\realisasi;
use App\Models\ruangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            // "realisasi"=> DB::table("realisasi")->orderBy("id_realisasi","desc")->get(),
            "realisasi"=> DB::table("realisasi")
                        ->join("ruangan","realisasi.id_ruangan", "=" ,"ruangan.id_ruangan")
                        ->join("perencanaan","realisasi.id_perencanaan", "=" ,"perencanaan.id_perencanaan")
                        ->select('realisasi.*','ruangan.nama_ruangan', 'perencanaan.*')
                        ->orderBy("id_realisasi","desc")
                        ->get(),
        ];
        return view('realisasi.index', $data);
    }

    public function detail(realisasi $realisasi, ruangan $ruangan, perencanaan $perencanaan, string $id)
    {
        $data = [
            "realisasi"=> $realisasi->where('id_realisasi', $id)->first(),
            "perencanaan"=>$perencanaan->all(),
            "ruangan"=>$ruangan->all(),

        ];
        return view('realisasi.detail', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id, ruangan $ruangan, perencanaan $perencanaan)
    {
        $data = [
            'perencanaan' => $perencanaan->select('id_perencanaan', 'nama_perencanaan')->where('id_perencanaan', $id)->first(),
            'ruangan' => $ruangan->all(),
        ];

        return view('realisasi.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, realisasi $realisasi,)
    {
        $data = $request->validate([
            'id_perencanaan' => 'required',
            'nama_realisasi' => 'required',
            'jumlah_dana_realisasi' => 'required',
            'id_ruangan' => 'required',
            'bukti_realisasi' => 'required',
        ]);


        if ($request->hasFile('bukti_realisasi')) {
            $foto_file = $request->file('bukti_realisasi');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['bukti_realisasi'] = $foto_nama;
        }
        
        if ($realisasi->create($data)) {
            return redirect('/realisasi')->with('success', 'Data Realisasi baru berhasil ditambah');
        }

        return back()->with('error', 'Data Realisasi gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, realisasi $realisasi)
    {
        $search = $request->input('search');

    $data = realisasi::where('nama_perencanaan', 'LIKE', "%$search%")
                     ->orWhere('id_realisasi', 'LIKE', "%$search%")
                     ->join("ruangan","realisasi.id_ruangan", "=" ,"ruangan.id_ruangan")
                     ->join("perencanaan","realisasi.id_perencanaan", "=" ,"perencanaan.id_perencanaan")
                     ->select('realisasi.*','ruangan.nama_ruangan', 'perencanaan.nama_perencanaan')
                     ->get();
        // dd($data);
    return view('realisasi.index', ['realisasi' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(realisasi $realisasi,ruangan $ruangan , string $id)
    {
        $realisasiData = realisasi::where('id_realisasi', $id)->first();
        $ruanganData = $ruangan->all();

        return view('realisasi.edit', [
            'realisasi' => $realisasiData,
            'ruangan' => $ruanganData,
        // dd($realisasiData, $ruanganData)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, realisasi $realisasi)
    {
        $id_realisasi = $request->input('id_realisasi');
        // Menyimpan validasi data yang ada di model realisasi
        $data = $request->validate([
            'nama_realisasi' => 'required',
            'jumlah_dana_realisasi' => 'required',
            'id_ruangan' => 'required',
            'bukti_realisasi' => 'sometimes',
        ]);

        if ($id_realisasi !== null) {
            if ($request->hasFile('bukti_realisasi')) {
                $foto_file = $request->file('bukti_realisasi');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $realisasi->where('id_realisasi', $id_realisasi)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['bukti_realisasi'] = $foto_nama;
            }

            $dataUpdate = $realisasi->where('id_realisasi', $id_realisasi)->update($data);

            if ($dataUpdate) {
                return redirect('realisasi')->with('success', 'Data Realisasi berhasil diupdate');
            }

            return back()->with('error', 'Data jenis Realisasi gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Realisasi $realisasi, Request $request)
    {
        $id_realisasi = $request->input('id_realisasi');
        $data = Realisasi::find($id_realisasi);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        $filePath = public_path('foto') . '/' . $data->file;

            $data->delete();
            return response()->json(['success' => true]);

    }

    public function cetak(realisasi $realisasi)
    {
            $data = $realisasi
                    ->join("ruangan","realisasi.id_ruangan", "=" ,"ruangan.id_ruangan")
                    ->join("perencanaan","realisasi.id_perencanaan", "=" ,"perencanaan.id_perencanaan")
                    ->select('realisasi.*','ruangan.nama_ruangan', 'perencanaan.*')
                    ->orderBy("id_realisasi","desc")
                    ->get();
            $pdf = PDF::loadView('realisasi.cetak', ['realisasi' => $data]);
            return $pdf->download('data_realisasi.pdf');

    }
}
