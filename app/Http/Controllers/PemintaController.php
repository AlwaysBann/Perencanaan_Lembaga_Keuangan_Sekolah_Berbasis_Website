<?php

namespace App\Http\Controllers;

use App\Models\jabatan_peminta;
use App\Models\peminta;
use App\Models\tbl_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PemintaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(peminta $peminta)
    {
        $data= [

           'peminta' => DB::table('peminta')
                            ->join('tbl_user', 'peminta.id_user', '=', 'tbl_user.id_user')
                            ->join('jabatan_peminta', 'peminta.id_jabatan_peminta', '=', 'jabatan_peminta.id_jabatan_pe')
                            ->select('peminta.*', 'tbl_user.*', 'jabatan_peminta.*')
                            ->get()
        ];
        // dd($data);
        return view('peminta.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(tbl_user $user, jabatan_peminta $jabatan)
    {
        $data = [
            'user' => $user->all(),
            'jabatan' => $jabatan->all(),
        ];
        return view('peminta.tambah', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, peminta $peminta)
    {
        $data = $request->validate([
            'nama_peminta' => 'required',
            'id_jabatan_peminta' => 'required',
            'id_user' => 'required',
            'mulai_jabat' => 'required',
            'akhir_jabat' => 'required',
        ]);


        if ($peminta->create($data)) {
            return redirect('/peminta')->with('success', 'Data Peminta baru berhasil ditambah');
        }

        return back()->with('error', 'Data Peminta gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(peminta $peminta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminta $peminta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, peminta $peminta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminta $peminta)
    {
        //
    }
}
