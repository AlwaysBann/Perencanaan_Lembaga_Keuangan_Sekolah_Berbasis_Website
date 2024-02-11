<?php

namespace App\Http\Controllers;

use App\Models\kelola;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\realisasi;
use App\Models\pembayaran;
use App\Models\sumber_dana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KelolaKeuanganController extends Controller
{
    public function create(realisasi $realisasi, pembayaran $pembayaran, sumber_dana $sumber_dana)
    {
        $data = [
            'realisasi' => $realisasi->get(),
            'pembayaran' => $pembayaran->get(),
            'sumber_dana' => $sumber_dana->get()
        ];

        return view('kelola.tambah', $data);
    }

    public function show(kelola $kelola, string $id)
    {
        $data = [
            'kelola' => $kelola
                        ->join('sumber_dana', 'kelola_keuangan.id_sumber_dana', '=', 'sumber_dana.id_sumber_dana')
                        ->where('kelola_keuangan.id_kelola_keuangan', $id)->first()
        ];

        return view('kelola.detail', $data);
    }

    public function confirm(pembayaran $pembayaran, $id)
    {
        $data = [
            'pembayaran' => $pembayaran->where('id_pembayaran', $id)->first()
        ];

        return view('kelola.confirm', $data);
    }

    public function simpan(Request $request, kelola $kelola)
    {

        $data = $request->validate([
            'id_pembayaran' => ['required'],
            'sumber_dana' => ['required'],
            'jumlah_dana' => ['required'],
            'tipe' => ['required'],
            'waktu' => ['required'],
            'bukti' => ['required'],
        ]);

        if ($data) {
            if ($request->hasFile('bukti') && $request->file('bukti')->isValid()) {
                $foto_file = $request->file('bukti');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('kelola_keuangan'), $foto_nama);
                $data['bukti'] = $foto_nama;
            }

            $kelola->create($data);

            return redirect('/dashboard')->with('success', 'Data kelola uang berhasil ditambah');
        }
    }

    public function store(Request $request, kelola $kelola)
    {
        $data = $request->validate([
            'id_sumber_dana' => ['required'],
            'tipe' => ['required'],
            'id_pembayaran' => ['sometimes'],
            'id_realisasi' => ['sometimes'],
            'jumlah_dana' => ['required'],
            'waktu' => ['required'],
            'bukti' => ['required'],
        ]);

        if ($data) {
            if ($request->hasFile('bukti') && $request->file('bukti')->isValid()) {
                $foto_file = $request->file('bukti');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('kelola_keuangan'), $foto_nama);
                $data['bukti'] = $foto_nama;
            }

            $kelola->create($data);

            return redirect('/dashboard')->with('success', 'Data kelola uang berhasil ditambah');
        }
    }

    public function edit(realisasi $realisasi, pembayaran $pembayaran, kelola $kelola, sumber_dana $sumber_dana, string $id)
    {
        $data = [
            'kelola' => $kelola
                ->leftJoin('pembayaran', 'kelola_keuangan.id_pembayaran', '=', 'pembayaran.id_pembayaran')
                ->leftJoin('realisasi', 'kelola_keuangan.id_realisasi', '=', 'realisasi.id_realisasi')
                ->where('id_kelola_keuangan', $id)
                ->first(),

            'realisasi' => $realisasi->get(),
            'pembayaran' => $pembayaran->get(),
            'sumber_dana' => $sumber_dana->get(),
        ];

        // dd($data);

        return view('kelola.edit', $data);
    }

    public function update(Request $request, kelola $kelola)
    {
        // dd($request->all());

        $id_kelola_keuangan = $request->input('id_kelola_keuangan');

        $data = $request->validate([
            'id_sumber_dana' => ['required'],
            'tipe' => ['required'],
            'id_pembayaran' => ['sometimes'],
            'id_realisasi' => ['sometimes'],
            'jumlah_dana' => ['required'],
            'waktu' => ['required'],
            'bukti' => ['sometimes'],
        ]);

        if ($id_kelola_keuangan !== null) {
            if ($request->hasFile('bukti')) {
                $foto_file = $request->file('bukti');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('item'), $foto_nama);

                $update_data = $kelola->where('id_kelola_keuangan', $id_kelola_keuangan)->first();
                File::delete(public_path('kelola_keuangan') . '/' . $update_data->file);

                $data['bukti'] = $foto_nama;
            }

        }

        if ($data) {
            $kelola->where('id_kelola_keuangan', $id_kelola_keuangan)->update($data);

            return redirect('/dashboard')->with('success', 'Data kelola uang berhasil ditambah');
        } else {
            return back()->with('error', 'Data Gagal diupdate');
        }
    }

    public function destroy(kelola $kelola, Request $request)
    {
        $id_kelola_keuangan = $request->input('id_kelola_keuangan');

        $data = $kelola->find($id_kelola_keuangan);

        if (!$data) {
            return response()->json(['success' => false, 'pesan' => 'Data tidak ditemukan'], 404);
        }
        
        if ($data) {
            $data->delete();
            return response()->json(['success' => true]);
        } 

    }

    public function cetak(kelola $kelola)
    {
        $data = [
            'kelola' => $kelola
                        ->join('sumber_dana', 'kelola_keuangan.id_sumber_dana', '=', 'sumber_dana.id_sumber_dana')
                        ->select('kelola_keuangan.*', 'sumber_dana.nama_sumber_dana', 'sumber_dana.dana_sumber_dana')
                        ->get()
        ];

        $pdf = PDF::loadView('kelola.cetak', $data);
        return $pdf->stream('kelola_keuangan.pdf');
    }}
