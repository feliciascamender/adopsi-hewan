<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // Admin account
        User::create([
            'name'     => 'Admin PawHome',
            'email'    => 'admin@pawhome.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
            'phone'    => '081234567890',
            'address'  => 'Jl. A. Yani No. 1, Banjarmasin, Kalimantan Selatan',
        ]);

        // Adopter accounts
        $adopters = [
            [
                'name'     => 'Budi Santoso',
                'email'    => 'budi@gmail.com',
                'password' => Hash::make('password123'),
                'role'     => 'adopter',
                'phone'    => '082345678901',
                'address'  => 'Jl. Lambung Mangkurat No. 5, Banjarmasin',
            ],
            [
                'name'     => 'Siti Aminah',
                'email'    => 'siti@gmail.com',
                'password' => Hash::make('password123'),
                'role'     => 'adopter',
                'phone'    => '083456789012',
                'address'  => 'Jl. Veteran No. 12, Banjarmasin',
            ],
            [
                'name'     => 'Ahmad Fauzi',
                'email'    => 'ahmad@gmail.com',
                'password' => Hash::make('password123'),
                'role'     => 'adopter',
                'phone'    => '084567890123',
                'address'  => 'Jl. Pangeran Samudra No. 8, Banjarmasin',
            ],
        ];

        foreach ($adopters as $adopter) {
            User::create($adopter);
        }

        $this->command->info('✅ Users seeded: 1 admin + 3 adopters');
    }
}