<?php

namespace App\Http\Controllers;

use App\Models\realisasi;
use App\Models\ruangan;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(realisasi $realisasi)
    {
        $data = [
            'realisasi' => $realisasi->with('ruangan')->get()
        ];

        return view('realisasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ruangan $ruangan)
    {
        $ruanganData = $ruangan->all();

        return view('realisasi.tambah', [
            'ruangan' => $ruanganData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, realisasi $realisasi)
    {
        $data = $request->validate([
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
            return redirect('/realisasi')->with('success', 'Data surat baru berhasil ditambah');
        }

        return back()->with('error', 'Data surat gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(realisasi $realisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, realisasi $realisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(realisasi $realisasi)
    {
        //
    }
}
