<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\perencanaan;
use App\Models\ruangan;
use App\Models\logs;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PerencanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(perencanaan $perencanaan)
    {

        $totalPerencanaan = DB::select('SELECT CountPerencanaan() AS Perencanaan')[0]->Perencanaan;
        $data = [
            "jumlahPerencanaan" => $totalPerencanaan,
            "perencanaan" => DB::table('perencanaan')
                ->join('pengajuan', 'perencanaan.id_pengajuan', '=', 'pengajuan.id_pengajuan')
                ->select('perencanaan.*', 'pengajuan.*')
                ->get()
        ];
        return view("data_perencanaan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pengajuan $pengajuan, string $id)
    {
        $data = [
            'pengajuan' => $pengajuan->select('id_pengajuan', 'nama_pengajuan')->where('id_pengajuan', $id)->first()
        ];
        return view('data_pengajuan.confirm', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, perencanaan $perencanaan, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'nama_perencanaan' => ['required'],
            'nama_penanggung_jawab' => ['required'],
            'waktu_realisasi' => ['required'],
            'id_pengajuan' => ['required'],
        ]);
        // dd($data);
        if ($perencanaan->create($data)) {
            $pengajuan
                ->where('id_pengajuan', $request->input('id_pengajuan'))
                ->update(['status' => 'setuju']);
            return redirect('/perencanaan')->with('success', 'Data Perencanaan Berhasil Ditambah');
        } else {
            return redirect()->back();
        }
    }

    public function search(Request $request, perencanaan $perencanaan)
    {
        $search = $request->input('search');

        $data = perencanaan::where('nama_perencanaan', 'LIKE', "%$search%")
            ->orWhere('id_perencanaan', 'LIKE', "%$search%")
            ->orWhere('nama_penanggung_jawab', 'LIKE', "%$search%")
            ->join('pengajuan', 'perencanaan.id_pengajuan', '=', 'pengajuan.id_pengajuan')
            ->select('perencanaan.*', 'pengajuan.*')
            ->get();

        return view('data_perencanaan.index', ['perencanaan' => $data]);
    }

    public function logs(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')
                ->get()
                ->filter(function ($log) {
                    return !Str::startsWith($log->logs, 'Akun')  && !Str::startsWith($log->logs, 'Tagihan') && !Str::startsWith($log->logs, 'Pengajuan');
                })
        ];

        return view('data_perencanaan.logs', $data);
    }

    /**
     * Display the specified resource.  
     */
    public function show(string $id, Request $request, perencanaan $perencanaan)
    {
        $pengajuan = $perencanaan->join('pengajuan', 'perencanaan.id_pengajuan', '=', 'pengajuan.id_pengajuan')->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('perencanaan.id_pengajuan', $id)->select('pengajuan.*', 'ruangan.*', 'perencanaan.nama_penanggung_jawab', 'perencanaan.nama_perencanaan', 'perencanaan.id_perencanaan')->first();
        // dd($pengajuan);
        return view('data_perencanaan.detail', compact('pengajuan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request, perencanaan $perencanaan, Pengajuan $pengajuan)
    {
        $data = [
            'perencanaan' => $perencanaan->where('id_pengajuan', $id)->first(),
            'pengajuan' => $pengajuan->select('id_pengajuan', 'nama_pengajuan')->where('id_pengajuan', $id)->first()
        ];
        // dd($data);
        return view('data_perencanaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perencanaan $perencanaan)
    {
        $id_perencanaan = $request->input('id_perencanaan');
        $data = $request->validate(
            [
                'nama_perencanaan' => ['required'],
                'nama_penanggung_jawab' => ['required'],
                'waktu_realisasi' => ['required'],
                'id_pengajuan' => ['required'],
            ]
        );
        if ($data) {
            $perencanaan->where('id_perencanaan', $id_perencanaan)->update($data);
            return redirect('/perencanaan')->with('success', 'Data berhasil diupdate');
        } else {
            return back()->with('error', 'Data Gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, perencanaan $perencanaan)
    {
        $id_perencanaan = $request->input('id_perencanaan');
        $data = $perencanaan->find($id_perencanaan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }

        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        }
    }

    public function cetak(string $id, perencanaan $perencanaan, Request $request)
    {
        $pengajuan = $perencanaan->join('pengajuan', 'perencanaan.id_pengajuan', '=', 'pengajuan.id_pengajuan')->join('ruangan', 'pengajuan.id_ruangan', '=', 'ruangan.id_ruangan')->where('perencanaan.id_pengajuan', $id)->select('pengajuan.*', 'ruangan.*', 'perencanaan.nama_penanggung_jawab', 'perencanaan.nama_perencanaan', 'perencanaan.id_perencanaan')->first();
        $pdf = PDF::loadView('data_perencanaan.cetak', compact('pengajuan'));
        return $pdf->stream('data_perencanaan.pdf');
    }
}
