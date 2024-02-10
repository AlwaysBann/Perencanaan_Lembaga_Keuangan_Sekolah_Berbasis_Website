<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(pembayaran $pembayaran)
    {
        $data = [
            'pembayaran' =>  
                $pembayaran
                ->join('siswa', 'pembayaran.id_siswa', '=', 'siswa.id_siswa')
                ->get()
        ];

        return view('pembayaran.index', $data);
    }

    
    public function detail(pembayaran $pembayaran, $id)
    {
        $data = [
            'pembayaran' =>  
                $pembayaran
                ->join('siswa', 'pembayaran.id_siswa', '=', 'siswa.id_siswa')
                ->join('tagihan', 'pembayaran.id_tagihan', '=', 'tagihan.id_tagihan')
                ->where('id_pembayaran', $id)
                ->first()
        ];

        return view('pembayaran.detail', $data);
    }

}
