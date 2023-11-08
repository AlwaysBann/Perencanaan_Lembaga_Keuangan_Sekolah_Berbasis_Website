<?php

namespace Database\Seeders;

use App\Models\jabatan_pengelola;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            [
                'nama_jabatan_pengelola' => 'Kepala Sekolah'
            ],
            [
                'nama_jabatan_pengelola' => 'Wakil Kepala Sekolah'
            ],
        ];
    
            foreach ($jabatan as $j => $val) {
                jabatan_pengelola::create($val);
        }
    }
}