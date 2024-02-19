<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'id_kelas' => 1,
            'id_user' => 5,
            'nis_siswa' => 010101,
            'nama_siswa' => 'lorem ipsu dolar',
            'jenis_kelamin' => 'Laki-Laki',
            'no_telp' => '12121'
        ]);
    }
}
