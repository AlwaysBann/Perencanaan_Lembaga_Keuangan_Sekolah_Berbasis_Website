<?php

namespace App\Http\Controllers;

use App\Models\perencanaan;
use App\Models\ruangan;
use Illuminate\Http\Request;

class PerencanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(perencanaan $perencanaan)
    {
        $data = [
            "perencanaan" => $perencanaan->all()
        ];
        return view("data_perencanaan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request, perencanaan $perencanaan, ruangan $ruangan)
    {
        $data = [
            'perencanaan' => $perencanaan->join('ruangan', 'perencanaan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_perencanaan', '=', $id)->first(),
            'ruangan' => $ruangan->join('perencanaan', 'ruangan.id_ruangan', '=', 'perencanaan.id_ruangan')->get()
        ];
        // dd($data);  
        return view('data_perencanaan.detail', $data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, perencanaan $perencanaan, ruangan $ruangan)
    {
        $data = [
            'perencanaan' => $perencanaan->join('ruangan', 'perencanaan.id_ruangan', '=', 'ruangan.id_ruangan')->where('id_perencanaan', '=', $id)->first(),
            'ruangan' => $ruangan->get()
        ];
        // dd($data);
        return view('data_pengajuan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perencanaan $perencanaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perencanaan $perencanaan)
    {
        //
    }
}
