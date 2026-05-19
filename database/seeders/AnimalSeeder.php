<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Animal::truncate();
        Schema::enableForeignKeyConstraints();

        $kucingId  = Species::where('name', 'Kucing')->first()->id;
        $anjingId  = Species::where('name', 'Anjing')->first()->id;
        $kelinciId = Species::where('name', 'Kelinci')->first()->id;

        $animals = [
            // Kucing
            [
                'species_id'  => $kucingId,
                'name'        => 'Luna',
                'gender'      => 'Betina',
                'age_months'  => 8,
                'description' => 'Kucing persia lucu dengan bulu putih bersih. Sangat jinak dan suka bermain.',
                'status'      => 'available',
            ],
            [
                'species_id'  => $kucingId,
                'name'        => 'Simba',
                'gender'      => 'Jantan',
                'age_months'  => 12,
                'description' => 'Kucing orange tabby yang energik dan pemberani. Sudah divaksin lengkap.',
                'status'      => 'available',
            ],
            [
                'species_id'  => $kucingId,
                'name'        => 'Mochi',
                'gender'      => 'Betina',
                'age_months'  => 6,
                'description' => 'Kucing anggora abu-abu yang manja dan penurut. Cocok untuk keluarga.',
                'status'      => 'available',
            ],

            // Anjing
            [
                'species_id'  => $anjingId,
                'name'        => 'Max',
                'gender'      => 'Jantan',
                'age_months'  => 18,
                'description' => 'Golden Retriever yang ramah dan pintar. Suka bermain dengan anak-anak.',
                'status'      => 'available',
            ],
            [
                'species_id'  => $anjingId,
                'name'        => 'Bella',
                'gender'      => 'Betina',
                'age_months'  => 10,
                'description' => 'Labrador coklat yang setia dan protektif. Sudah terlatih basic command.',
                'status'      => 'available',
            ],

            // Kelinci
            [
                'species_id'  => $kelinciId,
                'name'        => 'Snowy',
                'gender'      => 'Betina',
                'age_months'  => 5,
                'description' => 'Kelinci putih dengan mata merah. Sangat tenang dan mudah dirawat.',
                'status'      => 'available',
            ],
            [
                'species_id'  => $kelinciId,
                'name'        => 'Brownie',
                'gender'      => 'Jantan',
                'age_months'  => 7,
                'description' => 'Kelinci coklat yang aktif dan suka wortel. Cocok untuk pemula.',
                'status'      => 'available',
            ],

            // Hewan yang sudah diadopsi (untuk testing status)
            [
                'species_id'  => $kucingId,
                'name'        => 'Whiskers',
                'gender'      => 'Jantan',
                'age_months'  => 24,
                'description' => 'Kucing kampung yang sudah menemukan keluarga barunya.',
                'status'      => 'adopted',
            ],
        ];

        foreach ($animals as $animal) {
            Animal::create($animal);
        }

        $this->command->info('✅ Animals seeded: 8 animals (7 available, 1 adopted)');
    }
}