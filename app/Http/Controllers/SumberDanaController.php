<?php

namespace App\Http\Controllers;

use App\Models\kelola;
use App\Models\sumber_dana;
use Illuminate\Http\Request;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(sumber_dana $sumber_dana)
    {
        $data = [
            "sumber_dana" => $sumber_dana->all()
        ];

        return view("sumber_dana.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(kelola $kelola, sumber_dana $sumber_dana)
    {
        $data = [
            'sumber_dana' =>  $sumber_dana->get(),
            'kelola' => $kelola->get()
        ];

        // dd($data);

        return view("sumber_dana.tambah", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, sumber_dana $sumber_dana)
    {
        $data = $request->validate([
            'id_kelola_keuangan' => ['required'],
            'nama_sumber_dana' => ['required'],
            'dana_sumber_dana' => ['required'],
        ]);

        if ($sumber_dana->create($data)) {
            return redirect('sumber_dana')->with('success', 'Data Sumber Dana baru berhasil ditambah');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(sumber_dana $sumber_dana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sumber_dana $sumber_dana, kelola $kelola, string $id)
    {
        $data = [
            'sumber_dana' =>  $sumber_dana
                                ->where('sumber_dana.id_sumber_dana', $id)->first(),

            'kelola' => $kelola
                        ->select('kelola_keuangan.*', 'sumber_dana.nama_sumber_dana', 'sumber_dana.dana_sumber_dana')
                        ->join('sumber_dana', 'kelola_keuangan.id_sumber_dana', '=', 'sumber_dana.id_sumber_dana')->get()
        ];

        // dd($data);

        return view('sumber_dana.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sumber_dana $sumber_dana)
    {
        $id_sumber_dana = $request->input('id_sumber_dana');
        $data = $request->validate(
            [
                'id_kelola_keuangan' => ['required'],
                'nama_sumber_dana' => ['required'],
                'dana_sumber_dana' => ['required'],
            ]
        );
        if ($data) {
            $dataUpdate = $sumber_dana->where('id_sumber_dana', $id_sumber_dana)->update($data);
            if ($dataUpdate) {
                return redirect('/sumber_dana');
            }
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sumber_dana $sumber_dana, Request $request)
    {
        $id_sumber_dana = $request->input('id_sumber_dana');
        $data = $sumber_dana->find($id_sumber_dana);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        }
    }
}
