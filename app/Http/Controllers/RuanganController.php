<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ruangan $ruangan)
    {
        $data = [
            "ruangan" => $ruangan->all()
        ];
        return view("data_master.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("data_master.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ruangan $ruangan)
    {
        $data = $request->validate(
            [
                'nama_ruangan' => ['required'],
            ]
        );

        //Proses Insert
        if ($data) {
            $data['id_ruangan'] = 1;
            // Simpan jika data terisi semua
            $ruangan->create($data);
            return redirect('/ruangan')->with('success', 'Data user baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data user gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, ruangan $ruangan)
    {
        $data = [
            'ruangan' =>  $ruangan->select('id_ruangan', 'nama_ruangan')->where('id_ruangan', $id)->first()
        ];

        return view('data_master.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ruangan $ruangan)
    {
        $data = $request->validate(
            [
            'nama_ruangan'=> ['required'],
            ]
            );
            if ($data) {
                $data['id_ruangan'] = 1;
                $ruangan->update($data);
                return redirect('/ruangan')->with('success','Data berhasil ditambahkan');
            } else {
                return back()->with('error', 'Data Gagal ditambahkan');
            } 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ruangan $ruangan, Request $request)
    {
        $id_ruangan = $request->input('id_ruangan');
        $data = $ruangan->find($id_ruangan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

        return response()->json(['success' => false, 'pesan' => 'Data gagal dihapus']);
    }
}
