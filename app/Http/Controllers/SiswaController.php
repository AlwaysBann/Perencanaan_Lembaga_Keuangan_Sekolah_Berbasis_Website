<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Siswa $siswa)
    {
        $data= [

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
        $data = [
            'tbl_user' => $tbl_user->all(),
            'siswa' => $siswa->all(),
        ];
        return view('siswa.tambah', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, siswa $siswa)
    {
        $data = $request->validate([
            'id_user' => ['required'],
            'nama_siswa' => ['required'],
            'jenis_kelamin' => ['required'],
            'id_kelas' => ['required'],
        ]);

        // dd($data);
        //Proses Insert
        if ($data) {
            // Simpan jika data terisi semua
            $siswa->create($data);
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
        $data = [
            'id_siswa' => $siswa->where('id_siswa', $id)->first(),
            'id_user'=> $tbl_user->all(),
        ];

        return view('siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa)
    {
        $id_siswa = $request->input('id_siswa');
        $data = $request->validate([
            'id_user' => ['required'],
            'nama_siswa' => ['required'],
            'jenis_kelamin' => ['required'],
            'id_kelas' => ['required'],
        ]);

            $dataUpdate = $siswa->where('id_siswa', $id_siswa)->update($data);

            if ($dataUpdate) {
                return redirect('/siswa')->with('success', 'Data surat berhasil diupdate');
            }

            return back()->with('error', 'Data jenis surat gagal diupdate');
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
