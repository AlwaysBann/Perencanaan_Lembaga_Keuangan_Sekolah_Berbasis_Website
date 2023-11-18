<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(jurusan $j)
    {
        $data = [
            "jurusan" => $j->all()
        ];

        return view("jurusan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jurusan.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, jurusan $jurusan)
    {
        $data = $request->validate(
            [
                'nama_jurusan' => ['required'],
            ]
        );

        //Proses Insert
        if (DB::statement("CALL CreateDataJurusan(?)", [$data['nama_jurusan']])) {
            // Simpan jika data terisi semua
            return redirect('/jurusan')->with('success', 'Data Jurusan baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data Jurusan gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, jurusan $jurusan)
    {
        $data = [
            'jurusan' =>  $jurusan->select('id_jurusan', 'nama_jurusan')->where('id_jurusan', $id)->first()
        ];

        return view('jurusan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jurusan $jurusan)
    {
        $data = $request->validate(
            [
                'nama_jurusan'=> ['required'],
                ]
                );
                if ($data !== null) {
                    $dataUpdate= $jurusan->where('id_jurusan',$request->input('id_jurusan'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/jurusan');
                    }
                } else {
                    return back();
                } 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jurusan $jurusan, Request $request)
    {
        $id_jurusan = $request->input('id_jurusan');
        $data = $jurusan->find($id_jurusan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

    }
}
