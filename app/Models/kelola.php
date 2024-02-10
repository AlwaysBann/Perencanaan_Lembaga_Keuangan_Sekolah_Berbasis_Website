<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelola extends Model
{
    protected $table = "kelola_keuangan";
    protected $fillable = ['id_sumber_dana', 'id_realisasi', 'id_pembayaran', 'tipe', 'jumlah_dana', 'bukti', 'waktu'];
    protected $primaryKey = 'id_kelola_keuangan';
    public $timestamps = false;
}
