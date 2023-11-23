<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminta extends Model
{
    use HasFactory;
    protected $table = "peminta";
    protected $fillable = ['nama_peminta','mulai_jabat','akhir_jabat','id_user','id_jabatan_peminta'];
    protected $primaryKey = 'id_peminta';
    public $timestamps = false;
}
