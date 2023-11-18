<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengelola extends Model
{
    use HasFactory;
    protected $table = "pengelola";
    protected $fillable = ['nama_pengelola','mulai_jabat','akhir_jabat','id_user','id_jabatan_pengelola'];
    protected $primaryKey = 'id_pengelola';
    public $timestamps = false;
}
