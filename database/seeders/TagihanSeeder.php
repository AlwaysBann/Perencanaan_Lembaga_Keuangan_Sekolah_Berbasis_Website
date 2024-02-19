<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tagihan')->insert([
            'id_jenis_tagihan' => '1',
            'jumlah_tagihan' => '1200121',
            'tanggal_tagihan' => '2023/03/03',
        ]);
    }
}
