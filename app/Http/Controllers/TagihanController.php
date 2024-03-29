<?php

namespace App\Http\Controllers;

use App\Models\logs;
use App\Models\tagihan;
use App\Models\tbl_user;
use App\Models\JenisTagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tagihan' => DB::table('view_tagihan')->get()
        ];

        return view('tagihan.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(tagihan $tagihan, JenisTagihan $JenisTagihan)
    {
        $data = [
            'tagihan' => $tagihan->all(),
            'JenisTagihan' => $JenisTagihan->all(),
        ];
        return view('tagihan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tagihan $tagihan)
    {
        $data = $request->validate([
            'id_jenis_tagihan' => 'required',
            'jumlah_tagihan' => 'required',
            'tanggal_tagihan' => 'required',
        ]);

        $data['tanggal_tagihan'] = $data['tanggal_tagihan'] . '-01';
    
        if ($tagihan->create($data)) {
            return redirect('/tagihan')->with('success', 'Data tagihan baru berhasil ditambah');
        }
    
        return back()->with('error', 'Data tagihan gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tagihan $tagihan, JenisTagihan $jenisTagihan, $id)
    {
        $data = [
            'tagihan' => $tagihan->where('id_tagihan', $id)->first(),
            'JenisTagihan' => $jenisTagihan->all(),
        ];

        return view('tagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tagihan $tagihan)
    {
        $id_tagihan = $request->input('id_tagihan');
        $data = $request->validate([
            'id_jenis_tagihan' => 'required',
            'jumlah_tagihan' => 'required',
            'tanggal_tagihan' => 'required',
        ]);

        $dataUpdate = $tagihan->where('id_tagihan', $id_tagihan)->update($data);

        if ($dataUpdate) {
            return redirect('/tagihan')->with('success', 'Data tagihan berhasil diupdate');
        }

        return back()->with('error', 'Data jenis tagihan gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, tagihan $tagihan)
    {
        $id_tagihan = $request->input('id_tagihan');
        $data = $tagihan->find($id_tagihan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        }
    }

    public function logs(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')->get()
        ];

        return view('tagihan.logs', $data);
    }
}
