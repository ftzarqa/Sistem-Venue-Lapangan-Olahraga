<?php

namespace Database\Seeders;

use App\Models\AlatOlahraga;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin SportRent',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // 2. Akun User Biasa
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User Biasa',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        // 3. Data Awal Alat Olahraga (jika kosong)
        if (AlatOlahraga::count() === 0) {
            AlatOlahraga::create([
                'nama_alat' => 'Raket Badminton Yonex Nanoray',
                'kategori' => 'Bulu Tangkis',
                'kondisi' => 'Sangat Baik',
                'tarif_sewa' => 25000,
                'stok' => 8,
            ]);

            AlatOlahraga::create([
                'nama_alat' => 'Bola Basket Molten GG7X',
                'kategori' => 'Bola Basket',
                'kondisi' => 'Baik',
                'tarif_sewa' => 20000,
                'stok' => 5,
            ]);

            AlatOlahraga::create([
                'nama_alat' => 'Bola Futsal Specs Elysium',
                'kategori' => 'Sepak Bola & Futsal',
                'kondisi' => 'Baru',
                'tarif_sewa' => 20000,
                'stok' => 6,
            ]);
        }
    }
}
