<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $fillable = ['nama_ruangan'];
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;
}
