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
            'username' => 'suban',
            'role' => 'pengelola',
            'password' => Hash::make('123')
        ]];

        foreach ($users as $user => $val) {
            tbl_user::create($val);
    }
}
}
