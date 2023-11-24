<?php

namespace App\Http\Controllers;

use App\Models\logs_realisasi;
use Illuminate\Http\Request;

class logsRealisasiController extends Controller
{
    function index(logs_realisasi $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')->get()
        ];

        return view('realisasi.logs', $data);
    }
}
