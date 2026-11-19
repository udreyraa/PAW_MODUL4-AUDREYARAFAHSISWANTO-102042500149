<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Perpustakaan
        User::updateOrCreate(
            ['email' => 'admin@telkomlibrary.ac.id'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('admin12345'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ]
        );

        // 2. Akun Mahasiswa Dummy
        User::updateOrCreate(
            ['email' => 'mahasiswa@telkomlibrary.ac.id'],
            [
                'name' => 'Rio Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
                'email_verified_at' => now(),
                'role' => 'mahasiswa',
            ]
        );
    }
}