<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan_pengelola extends Model
{
    use HasFactory;
    protected $table = "jabatan_pengelola";
    protected $fillable = ['nama_jabatan_pengelola'];
    protected $primaryKey = 'id_jabatan_pengelola';
    public $timestamps = false;

    public function pengelola()
    {
        return $this->hasMany(pengelola::class, 'id_pengelola');
    }
}   
