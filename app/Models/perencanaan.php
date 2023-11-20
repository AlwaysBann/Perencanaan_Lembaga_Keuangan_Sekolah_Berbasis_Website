<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perencanaan extends Model
{
    use HasFactory;
    protected $table = 'perencanaan';
    protected $fillable = ['nama_perencanaan', 'nama_penanggung_jawab','waktu_realisasi', 'id_pengajuan'];
    protected $primaryKey = 'id_perencanaan';
    public $timestamps = false;
}
