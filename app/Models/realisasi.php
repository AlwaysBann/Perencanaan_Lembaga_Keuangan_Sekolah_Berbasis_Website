<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realisasi extends Model
{
    use HasFactory;
    protected $table = 'realisasi';
    protected $fillable = ['id_realisasi','id_ruangan','nama_realisasi', 'jumlah_dana_realisasi', 'bukti_realisasi'];
    protected $primaryKey = 'id_realisasi';
    public $timestamps = false;

    public function ruangan()
    {
        return $this->belongsTo(ruangan::class);
    }
    public function getRuanganAttribute()
    {
        return ruangan::find($this->attributes['id_ruangan'])->jenis_surat;
    }
}
