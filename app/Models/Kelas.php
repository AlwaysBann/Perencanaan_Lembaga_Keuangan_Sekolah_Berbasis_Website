<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ['id_angkatan','nama_kelas','id_jurusan'];
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
}