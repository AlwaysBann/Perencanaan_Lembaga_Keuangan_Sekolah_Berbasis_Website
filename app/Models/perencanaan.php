<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perencanaan extends Model
{
    use HasFactory;
    protected $table = 'perencanaan';
    protected $fillable = ['nama_perencana', 'nama_perencanaan', 'tujuan_perencanaan', 'nama_item', 'jumlah_item', 'spesifikasi_item',
                            'harga_item', 'jenis_item', 'id_ruangan', 'waktu_pengajuan','id_pengajuan'];
    protected $primaryKey = 'id_penrencanaan';
    public $timestamps = false;
}
