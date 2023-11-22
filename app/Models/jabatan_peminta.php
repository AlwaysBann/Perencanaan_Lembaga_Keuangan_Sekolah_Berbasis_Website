<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan_peminta extends Model
{
    use HasFactory;
    protected $table = "jabatan_peminta";
    protected $fillable = ['nama_jabatan_peminta'];
    protected $primaryKey = 'id_jabatan_peminta';
    public $timestamps = false;

    public function peminta()
    {
        return $this->hasMany(peminta::class, 'id_peminta');
    }
}
