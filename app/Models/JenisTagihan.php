<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTagihan extends Model
{
    use HasFactory;
    protected $table = "JenisTagihan";
    protected $fillable = ['nama_jenis_tagihan'];
    protected $primaryKey = 'id_jenis_tagihan';
    public $timestamps = false;
}
