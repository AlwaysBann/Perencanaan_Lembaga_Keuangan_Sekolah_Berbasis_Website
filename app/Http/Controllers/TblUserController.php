<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
                'foto_profil'=> ['sometimes'],
            ]
        );

        if ($request->hasFile('foto_profil')) {
            $foto_file = $request->file('foto_profil');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_profil'] = $foto_nama;
        }

        //Proses Insert
        $filter = $user->where('username', $data['username'])->first();
        // dd($filter);
        if ($filter) {
            return back()->with('error', 'Data user gagal ditambahkan, Karena sudah ada');
        } else {
            $data['id_user'] = 1;
            $user->create($data);
            return redirect('/akun')->with('success', 'Data user baru berhasil ditambah');
            // Kembali ke form tambah data
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, tbl_user $tbl_user)
    {
        $search = $request->input('search');

    $data = tbl_user::where('username', 'LIKE', "%$search%")
                     ->orWhere('id_user', 'LIKE', "%$search%")
                     ->get();

    return view('tbl_user.index', ['user' => $data]);
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
                'foto_profil'=> ['sometimes'],
                ]
                );
                if ($data !== null) {
                    $foto_file = $request->file('foto_profil');
                    $foto_extension = $foto_file->getClientOriginalExtension();
                    $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                    $foto_file->move(public_path('foto'), $foto_nama);

                    $update_data = $user->where('id_user', $request->input('id_user'))->first();
                    File::delete(public_path('foto') . '/' . $update_data->file);

                    $data['foto_profil'] = $foto_nama;
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
