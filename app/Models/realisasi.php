<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realisasi extends Model
{
    use HasFactory;
    protected $table = 'realisasi';
    protected $fillable = ['nama_realisasi', 'jumlah_dana_realisasi', 'bukti_realisasi'];
    protected $primaryKey = 'id_realisasi';
    public $timestamps = false;
}
