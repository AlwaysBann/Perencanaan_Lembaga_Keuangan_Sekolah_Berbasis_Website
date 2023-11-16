<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TblUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(tbl_user $user)
    {
        // Mendapatkan data user dan mengirimkan
        //  ke dalam halaman tbl_user.index untuk ditampilkan
        $totalAkun = DB::select('SELECT CountAkun() AS Akun')[0]->Akun;
        $data = [
            'user' => $user->all(),
            'jumlahAkun' => $totalAkun
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
            'user' =>  tbl_user::where('id_user', $id)->first()
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
                'role'=> ['sometimes'],
                ]
                );
                if ($data !== null) {
                    // $data['id_user'] = 1;
                    $dataUpdate= $user->where('id_user',$request->input('id_user'))->update($data);
                    if ($dataUpdate) {
                    return redirect('/akun');
                    }
                } else {
                    return back();
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
