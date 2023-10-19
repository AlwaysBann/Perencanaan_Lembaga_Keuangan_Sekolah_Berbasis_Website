<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $table = "ruangans";
    protected $fillable = ['nama_ruangan'];
    protected $primaryKey = 'id_ruangan';
    public $timestamps = false;
}
