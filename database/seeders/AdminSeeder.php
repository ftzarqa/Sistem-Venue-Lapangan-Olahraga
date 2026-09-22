<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@venuebola.test',
        ]);

        $admin->forceFill([
            'name' => 'Admin VenueBola',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ])->save();
    }
}