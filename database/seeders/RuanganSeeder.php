<?php

namespace Database\Seeders;

use App\Models\ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan = [
            [
                'nama_ruangan' => 'Lab RPL 1'
            ],
            [
                'nama_ruangan' => 'Lab RPL 2'
            ],
            [
                'nama_ruangan' => 'Lab RPL BLUD'
            ],
            [
                'nama_ruangan' => 'Lab TKJ 1'
            ],
            [
                'nama_ruangan' => 'Lab TKJ 2'
            ],
        ];
    
            foreach ($ruangan as $r => $val) {
                ruangan::create($val);
        }
    }
}
