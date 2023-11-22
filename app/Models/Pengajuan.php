<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $fillable = ['nama_pengaju', 'nama_pengajuan', 'tujuan_pengajuan', 'nama_item', 'jumlah_item', 'spesifikasi_item',
                            'harga_satuan', 'jenis_item', 'id_ruangan', 'waktu_pengajuan','gambar_item', 'pembuat'];
    protected $primaryKey = 'id_pengajuan';
    public $timestamps = false;
}
