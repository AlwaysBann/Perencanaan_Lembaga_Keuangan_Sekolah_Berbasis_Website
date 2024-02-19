<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('jurusan')->insert([
            'nama_jurusan' => 'Nama Jurusan 1'
        ]);
    }
}
