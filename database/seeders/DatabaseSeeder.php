<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //buat akun admin
        User::create([
            'name' => 'Pawlads',
            'email' => 'admin@pawlads.com',
            'password' => bcrypt('cleonforlife'),
            'role' => 'admin',
            'phone' => '089999999999',
            'address' => 'No-hunt zone, Linkon City',
        ]);

        //buat akun adopter
        User::create([
            'name' => 'Felicia Scamender',
            'email' => 'feliciascamender@gmail.com',
            'password' => bcrypt('rafayelmwah'),
            'role' => 'adopter',
            'phone' => '089999999998',
            'address' => 'Sundara Island, Linkon City',
        ]);

        //data species awal
        Species::insert(
            [
                [
                    'name' => 'Kucing',
                    'description' => 'no words needed, just look at the name',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Anjing',
                    'description' => 'the cutest in the world',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
