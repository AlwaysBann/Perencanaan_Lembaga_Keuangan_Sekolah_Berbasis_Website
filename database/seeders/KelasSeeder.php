<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        DB::table('kelas')->insert([
            'id_angkatan' => 1,
            'id_jurusan' => 1,
            'nama_kelas' => 'Nama Kelas 1'
        ]);
    }
}
