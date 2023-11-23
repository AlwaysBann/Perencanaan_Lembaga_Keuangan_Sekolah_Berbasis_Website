<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagihan extends Model
{
    use HasFactory;
    protected $table = "tagihan";
    protected $fillable = ['id_jenis_tagihan','jumlah_tagihan','tanggal_tagihan'];
    protected $primaryKey = 'id_tagihan';
    public $timestamps = false;
}
