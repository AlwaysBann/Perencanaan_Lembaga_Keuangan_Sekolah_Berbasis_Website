<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisTagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['eo', 'koa'];

        foreach ($data as $key => $value) {
            DB::table('JenisTagihan')->insert([
                'nama_jenis_tagihan' => $value
            ]);
        }
    }
}
