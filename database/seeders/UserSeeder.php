<?php

namespace Database\Seeders;

use App\Models\tbl_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
        [
            'username' => 'super',
            'role' => 'super_admin',
            'password' => Hash::make('super')
        ],
        [
            'username' => 'alpoy',
            'role' => 'pengelola',
            'password' => Hash::make('alpoy')
        ],
        [
            'username' => 'raihanda',
            'role' => 'peminta',
            'password' => Hash::make('1234')
        ],
        [
            'username' => 'suban',
            'role' => 'pengelola',
            'password' => Hash::make('123')
        ],
        [
            'username' => 'siswa',
            'role' => 'siswa',
            'password' => Hash::make('siswa')
        ]
    ];

        foreach ($users as $user => $val) {
            tbl_user::create($val);
    }
}
}
