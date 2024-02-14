<?php

namespace App\Http\Controllers;

use App\Models\angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(angkatan $a)
    {
        $totalAngkatan = DB::select('SELECT CountAngkatan() AS Angkatan')[0]->Angkatan;
        $data = [
            'jumlahAngkatan' => $totalAngkatan,
            "angkatan" => DB::table('view_angkatan')->get()
        ];

        return view("angkatan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("angkatan.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'no_angkatan' => ['required'],
            'tahun_masuk' => ['required'],
            'tahun_keluar' => ['required'],
        ]);

        if (DB::statement("CALL CreateDataAngkatan(?, ?, ?)", [$data['no_angkatan'], $data['tahun_masuk'], $data['tahun_keluar']])) {
            return redirect('/angkatan')->with('success', 'Data Angkatan baru berhasil ditambah');
        } else {
            return back()->with('error', 'Data Angkatan gagal ditambahkan');
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(angkatan $angkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, angkatan $angkatan)
    {
        $data = [
            'angkatan' =>  $angkatan->select('no_angkatan', 'tahun_masuk','tahun_keluar')->where('id_angkatan', $id)->first()
        ];

        return view('angkatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, angkatan $angkatan)
    {
        $data = $request->validate(
            [
                'no_angkatan'=> ['required'],
                'tahun_masuk'=> ['required'],
                'tahun_keluar'=> ['required'],
                ]
                );
                if ($data !== null) {
                    $dataUpdate= $angkatan->where('id_angkatan',$request->input('id_angkatan'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/angkatan');
                    }
                } else {
                    return back();
                } 
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(angkatan $angkatan, Request $request)
    {
        $id_angkatan = $request->input('id_angkatan');
        $data = $angkatan->find($id_angkatan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

    }
}
