<?php

namespace App\Http\Controllers;

use App\Models\logs;
use Illuminate\Http\Request;

class logsAkunController extends Controller
{
    function index(logs $logs)
    {
        $data = [
            'logs' => $logs::orderBy('id_logs', 'desc')->get()
        ];

        return view('logs_akun.index', $data);
    }
}
