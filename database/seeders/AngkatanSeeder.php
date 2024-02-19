<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AngkatanSeeder extends Seeder
{
    public function run()
    {
        DB::table('angkatan')->insert([
            'no_angkatan' => 1,
            'tahun_masuk' => '2020',
            'tahun_keluar' => '2024'
        ]);
    }
}