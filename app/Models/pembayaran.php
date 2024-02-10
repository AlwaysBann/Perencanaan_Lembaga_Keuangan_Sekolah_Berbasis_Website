<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";
    protected $fillable = ['id_tagihan', 'id_siswa','nis_siswa','jumlah_dana_pembayaran','nama_sumber_dana','waktu_pembayaran','bukti_pembayaran'];
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;
}
