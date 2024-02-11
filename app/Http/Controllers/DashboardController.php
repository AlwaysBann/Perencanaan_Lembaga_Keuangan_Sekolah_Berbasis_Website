<?php

namespace App\Http\Controllers;

use App\Models\kelola;
use App\Models\dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(kelola $kelola)
    {
        $dana_spp = DB::select('SELECT CalculateTotalValue(?) as dana_spp', ['Dana-SPP'])[0]->dana_spp;
        $dana_bos = DB::select('SELECT CalculateTotalValue(?) as dana_bos', ['Dana-BOS'])[0]->dana_bos;
        $dana_bopd = DB::select('SELECT CalculateTotalValue(?) as dana_bopd', ['Dana-BOPD'])[0]->dana_bopd;
        $dana_komite = DB::select('SELECT CalculateTotalValue(?) as dana_komite', ['Dana-Komite'])[0]->dana_komite;
        $totalDana = DB::select('SELECT CalculateTotalDanaSumberDana() as totalDana')[0]->totalDana;
        
        $data = [
            'kelola' => $kelola
                ->join('sumber_dana', 'kelola_keuangan.id_sumber_dana', '=', 'sumber_dana.id_sumber_dana')
                ->select('kelola_keuangan.*', 'sumber_dana.nama_sumber_dana', 'sumber_dana.dana_sumber_dana')
                ->get(),

            'totalSPP' => $dana_spp,
            'totalBOS' => $dana_bos,
            'totalBOPD' => $dana_bopd,
            'totalKomite' => $dana_komite,
            'totalDana' => $totalDana

        ];

        return view("dashboard.index", $data);
    }
}
