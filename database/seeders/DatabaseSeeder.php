<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan seeder PENTING karena foreign key constraints
        $this->call([
            UserSeeder::class,
            SpeciesSeeder::class,
            AnimalSeeder::class,
            MedicalRecordSeeder::class,
            AdoptionSeeder::class,
        ]);

        $this->command->info('✅ Database seeding completed successfully!');
    }
}