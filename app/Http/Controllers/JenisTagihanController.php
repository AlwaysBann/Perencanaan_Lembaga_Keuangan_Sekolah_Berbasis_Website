<?php

namespace App\Http\Controllers;

use App\Models\JenisTagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenisTagihan $JenisTagihan)
    {
        $data = [
            "JenisTagihan" => $JenisTagihan->all()
        ];

        return view("JenisTagihan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("JenisTagihan.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JenisTagihan $JenisTagihan)
    {
        $data = $request->validate(
            [
                'nama_jenis_tagihan' => ['required'],
            ]
        );

        //Proses Insert
        if (DB::statement("CALL CreateDataJenisTagihan(?)", [$data['nama_jenis_tagihan']])) {
            // Simpan jika data terisi semua
            return redirect('/JenisTagihan')->with('success', 'Data Jenis Tagihan baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data Jenis Tagihan gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisTagihan $JenisTagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, JenisTagihan $JenisTagihan)
    {
        $data = [
            'JenisTagihan' =>  $JenisTagihan->select('id_jenis_tagihan', 'nama_jenis_tagihan')->where('id_jenis_tagihan', $id)->first()
        ];

        return view('JenisTagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisTagihan $JenisTagihan)
    {
        $data = $request->validate(
            [
                'nama_jenis_tagihan'=> ['required'],
                ]
                );
                if ($data !== null) {
                    $dataUpdate= $JenisTagihan->where('id_jenis_tagihan',$request->input('id_jenis_tagihan'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/JenisTagihan');
                    }
                } else {
                    return back();
                } 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisTagihan $JenisTagihan, Request $request)
    {
        $id_jenis_tagihan = $request->input('id_jenis_tagihan');
        $data = $JenisTagihan->find($id_jenis_tagihan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

    }
}
