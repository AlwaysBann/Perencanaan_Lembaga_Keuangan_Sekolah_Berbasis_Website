<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class tbl_user extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $fillable = ['username', 'password', 'role'];
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $casts = [
        'password' => 'hashed',
    ];
}
