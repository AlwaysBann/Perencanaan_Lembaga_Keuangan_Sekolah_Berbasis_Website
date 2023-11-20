<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class angkatan extends Model
{
    use HasFactory;
    protected $table = "angkatan";
    protected $fillable = ['no_angkatan','tahun_masuk','tahun_keluar'];
    protected $primaryKey = 'id_angkatan';
    public $timestamps = false;
}