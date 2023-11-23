<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswa";
    protected $fillable = ['nis_siswa','id_user','id_kelas','nama_siswa','jenis_kelamin','no_telp'];
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;
}