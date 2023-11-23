<?php

namespace App\Http\Controllers;

use App\Models\jabatan_peminta;
use Illuminate\Http\Request;

class JabatanPemintaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(jabatan_peminta $jabatan)
    {
        $data = [
            "jabatan" => $jabatan->all()
        ];
        return view("jabatan_peminta.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jabatan_peminta.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, jabatan_peminta $jabatan)
    {
        $data = $request->validate(
            [
                'nama_jabatan_peminta' => ['required'],
            ]
        );

        //Proses Insert
        if ($data) {
            $data['id_jabatan_peminta'] = 1;
            // Simpan jika data terisi semuanya
            $jabatan->create($data);
            return redirect('/jabatan_peminta')->with('success', 'Data jabatan peminta baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data jabatan peminta gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(jabatan_peminta $jabatan_peminta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, jabatan_peminta $jabatan)
    {
        $data = [
            'jabatan' =>  $jabatan->all()->where('id_jabatan_peminta', $id)->first()
        ];

        return view('jabatan_peminta.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jabatan_peminta $jabatan)
    {
        $data = $request->validate(
            [
                'nama_jabatan_peminta'=> ['required'],
                ]
                );
                if ($data) {
                    $dataUpdate= $jabatan->where('id_jabatan_peminta',$request->input('id_jabatan_peminta'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/jabatan_peminta');
                    }
                } else {
                    return back();
                } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jabatan_peminta $jabatan, Request $request)
    {
        $id_jabatan = $request->input('id_jabatan_peminta');
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
