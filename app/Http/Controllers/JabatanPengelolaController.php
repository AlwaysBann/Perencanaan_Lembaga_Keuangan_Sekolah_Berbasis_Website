<?php

namespace App\Http\Controllers;

use App\Models\jabatan_pengelola;
use Illuminate\Http\Request;

class JabatanPengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(jabatan_pengelola $jabatan)
    {
        $data = [
            "jabatan" => $jabatan->all()
        ];
        return view("jabatan_pengelola.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jabatan_pengelola.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, jabatan_pengelola $jabatan)
    {
        $data = $request->validate(
            [
                'nama_jabatan_pengelola' => ['required'],
            ]
        );

        //Proses Insert
        if ($data) {
            $data['id_jabatan_pengelola'] = 1;
            // Simpan jika data terisi semua
            $jabatan->create($data);
            return redirect('/jabatan_pengelola')->with('success', 'Data jabatan pengelola baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data jabatan pengelola gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(jabatan_pengelola $jabatan_pengelola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, jabatan_pengelola $jabatan)
    {
        $data = [
            'jabatan' =>  $jabatan->all()->where('id_jabatan_pengelola', $id)->first()
        ];

        return view('jabatan_pengelola.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jabatan_pengelola $jabatan)
    {
        $data = $request->validate(
            [
                'nama_jabatan_pengelola'=> ['required'],
                ]
                );
                if ($data) {
                    $dataUpdate= $jabatan->where('id_jabatan_pengelola',$request->input('id_jabatan_pengelola'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/jabatan_pengelola');
                    }
                } else {
                    return back();
                } 
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(jabatan_pengelola $jabatan, Request $request)
    {
        $id_jabatan = $request->input('id_jabatan_pengelola');
        $data = $jabatan->find($id_jabatan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

    }
}
