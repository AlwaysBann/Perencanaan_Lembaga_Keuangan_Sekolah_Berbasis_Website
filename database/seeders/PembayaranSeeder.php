<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembayaran')->insert([
            'id_tagihan' => '1',
            'id_siswa' => '1',
            'nis_siswa' => '12121',
            'nama_sumber_dana' => 'Dana-SPP',
            'jumlah_dana_pembayaran' => 12121,
            'waktu_pembayaran' => '2023/12/04',
            'bukti_pembayaran' => '0a1d1d32b8b3b8638964e8bc19b08c19.png',
        ]);
    }
}
