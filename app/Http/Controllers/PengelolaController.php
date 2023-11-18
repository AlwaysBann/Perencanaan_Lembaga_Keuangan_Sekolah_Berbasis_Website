<?php

namespace App\Http\Controllers;

use App\Models\jabatan_pengelola;
use App\Models\pengelola;
use App\Models\tbl_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(pengelola $pengelola)
    {
        $data= [

           'pengelola' => DB::table('pengelola')
                            ->join('tbl_user', 'pengelola.id_user', '=', 'tbl_user.id_user')
                            ->join('jabatan_pengelola', 'pengelola.id_jabatan_pengelola', '=', 'jabatan_pengelola.id_jabatan_pengelola')
                            ->select('pengelola.*', 'tbl_user.*', 'jabatan_pengelola.*')
                            ->get()
        ];
        // dd($data);
        return view('pengelola.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(tbl_user $user, jabatan_pengelola $jabatan)
    {
        $data = [
            'user' => $user->all(),
            'jabatan' => $jabatan->all(),
        ];
        return view('pengelola.tambah', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, pengelola $pengelola)
    {
        $data = $request->validate([
            'nama_pengelola' => 'required',
            'id_jabatan_pengelola' => 'required',
            'id_user' => 'required',
            'mulai_jabat' => 'required',
            'akhir_jabat' => 'required',
        ]);


        if ($pengelola->create($data)) {
            return redirect('/pengelola')->with('success', 'Data surat baru berhasil ditambah');
        }

        return back()->with('error', 'Data surat gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengelola $pengelola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengelola $pengelola,tbl_user $user,jabatan_pengelola $jabatan, string $id)
    {
        $data = [
            'pengelola' => $pengelola->where('id_pengelola', $id)->first(),
            'user'=> $user->all(),
            'jabatan' => $jabatan->all(),
        ];

        return view('pengelola.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengelola $pengelola)
    {
        $id_pengelola = $request->input('id_pengelola');
        $data = $request->validate([
            'nama_pengelola' => 'required',
            'id_jabatan_pengelola' => 'required',
            'id_user' => 'required',
            'mulai_jabat' => 'required',
            'akhir_jabat' => 'required',
        ]);

            $dataUpdate = $pengelola->where('id_pengelola', $id_pengelola)->update($data);

            if ($dataUpdate) {
                return redirect('/pengelola')->with('success', 'Data surat berhasil diupdate');
            }

            return back()->with('error', 'Data jenis surat gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, pengelola $pengelola)
    {
        $id_pengelola = $request->input('id_pengelola');
        $data = $pengelola->find($id_pengelola);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 
    }
}
