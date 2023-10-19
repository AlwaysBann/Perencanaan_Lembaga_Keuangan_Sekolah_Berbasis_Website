<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;

class TblUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(tbl_user $user)
    {
        $data = [
            'user' => $user->all()
        ];
        return view('tbl_user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tbl_user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, tbl_user $user)
    {
        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
                'role'    => ['required'],
            ]
        );

        //Proses Insert
        if ($data) {
            $data['id_user'] = 1;
            // Simpan jika data terisi semua
            $user->create($data);
            return redirect('/akun')->with('success', 'Data user baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data user gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_user $tbl_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, tbl_user $user)
    {
        $data = [
            'user' =>  $user->select('id_user', 'username', 'role')->where('id_user', $id)->first()
        ];

        return view('tbl_user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_user $user)
    {
        $data = $request->validate(
            [
                'username'=> ['required'],
                'password'=> ['required'],
                'role'=> ['required'],
                ]
                );
                if ($data) {
                    $data['id_user'] = 1;
                    $user->update($data);
                    return redirect('/akun')->with('success','Data berhasil ditambahkan');
                } else {
                    return back()->with('error', 'Data Gagal ditambahkan');
                } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_user $user, Request $request)
    {
        $id_user = $request->input('id_user');
        $data = $user->find($id_user);

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
