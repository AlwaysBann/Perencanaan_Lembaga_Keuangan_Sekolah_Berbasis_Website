<?php

namespace App\Http\Controllers;

use App\Models\angkatan;
use App\Models\jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kelas $kelas)
    {
        $totalKelas = DB::select('SELECT CountKelas() AS Kelas')[0]->Kelas;
        $data= [
            'jumlahKelas' => $totalKelas,
            'kelas' => DB::table('kelas')
                            ->join('angkatan', 'kelas.id_angkatan', '=', 'angkatan.id_angkatan')
                            ->join('jurusan', 'kelas.id_jurusan', '=', 'jurusan.id_jurusan')
                            ->select('kelas.*', 'angkatan.*', 'jurusan.*')
                            ->get(),
        ];
        // dd($data);
        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(jurusan $jurusan, angkatan $angkatan)
    {
        $data = [
            'jurusan' => $jurusan->all(),
            'angkatan' => $angkatan->all(),
        ];
        return view('kelas.tambah', $data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => ['required'],
            'id_angkatan' => ['required'],
            'id_jurusan' => ['required'],
        ]);

        // Proses Insert
        if (DB::statement("CALL CreateDataKelas(?, ?, ?)", [$data['nama_kelas'], $data['id_angkatan'], $data['id_jurusan']])) {
            // Simpan jika data terisi semua
            return redirect('/kelas')->with('success', 'Data Kelas baru berhasil ditambah');
        } else {
            // Kembali ke form tambah data
            return back()->with('error', 'Data Kelas gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kelas $kelas,angkatan $angkatan,jurusan $jurusan, string $id)
    {
        $data = [
            'kelas' => $kelas->where('id_kelas', $id)->first(),
            'angkatan'=> $angkatan->all(),
            'jurusan' => $jurusan->all(),
        ];

        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kelas $kelas)
    {
        $id_kelas = $request->input('id_kelas');
        $data = $request->validate([
            'nama_kelas' => 'required',
            'id_angkatan' => 'required',
            'id_jurusan' => 'required',
        ]);

            $dataUpdate = $kelas->where('id_kelas', $id_kelas)->update($data);

            if ($dataUpdate) {
                return redirect('/kelas')->with('success', 'Data kelas berhasil diupdate');
            }

            return back()->with('error', 'Data jenis kelas gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, kelas $kelas)
    {
        $idkelas = $request->input('id_kelas');
        $data = $kelas->find($idkelas);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 
    }
}