<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $table = "ruangan";
    protected $fillable = ['nama_ruangan'];
    protected $primaryKey = 'id_ruangan';
    public $timestamps = false;

    public function realisasi()
    {
        return $this->hasMany(realisasi::class, 'id_realisasi');
    }
}
