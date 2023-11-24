<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs_realisasi extends Model
{
    use HasFactory;
    protected $table = 'logs_realisasi';
    protected $fillable = ['logs'];
    protected $primaryKey = 'id_logs';
    public $timestamps = false;
}