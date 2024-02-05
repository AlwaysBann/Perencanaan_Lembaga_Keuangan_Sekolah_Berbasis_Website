<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Siswa $siswa)
    {
        $totalSiswa = DB::select('SELECT CountSiswa() AS Siswa')[0]->Siswa;
        $data= [
            'jumlahSiswa' => $totalSiswa,
            'siswa' => DB::table('siswa')
                            ->join('tbl_user', 'siswa.id_user', '=', 'tbl_user.id_user')
                            ->join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
                            ->select('tbl_user.*', 'kelas.*', 'siswa.*')
                            ->get()
        ];
        // dd($data);
        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(tbl_user $tbl_user, siswa $siswa)
    {
        $user = tbl_user::all();
        $kelas = Kelas::all();
        return view('siswa.tambah', [
            'nama_user' => $user,
            'nama_kelas' => $kelas,
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'nis_siswa' => ['required'],
            'nama_siswa' => ['required'],
            'jenis_kelamin' => ['required'],
            'no_telp' => ['required'],
            'id_kelas' => ['required'],
        ]);

        //Proses Insert
        if (DB::statement("CALL CreateDataSiswa(?, ?, ?, ?, ?, ?)", array_values($data))) {
            // Simpan jika data terisi semua
            return redirect('/siswa')->with('success', 'Data Siswa baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data Siswa gagal ditambahkan');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( siswa $siswa, tbl_user $tbl_user, string $id)
    {
       $siswa = Siswa::where('id_siswa', $id)->first();
       $user = tbl_user::all();
       $kelas = kelas::all();

        return view('siswa.edit', [
            'nama_siswa' => $siswa,
            'nama_user' => $user,
            'nama_kelas' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa, $id)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'nis_siswa' => ['required'],
            'nama_siswa' => ['required'],
            'jenis_kelamin' => ['required'],
            'id_kelas' => ['required'],
            'no_telp' => ['required'],
        ]);

            $dataUpdate = $siswa->where('id_siswa', $id)->update($data);

            if ($dataUpdate) {
                return redirect('/siswa')->with('success', 'Data siswa berhasil diupdate');
            }

            return back()->with('error', 'Data jenis siswa gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, siswa $siswa)
    {
        $idsiswa = $request->input('id_siswa');
        $data = $siswa->find($idsiswa);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 
    }
}
