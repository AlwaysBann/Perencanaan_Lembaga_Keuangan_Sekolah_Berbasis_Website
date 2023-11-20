<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angkatan extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $fillable = ['id_kelas','nama_kelas',];
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
}