<?php

namespace Database\Seeders;

use App\Models\MedicalRecord;
use App\Models\Animal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MedicalRecordSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MedicalRecord::truncate();
        Schema::enableForeignKeyConstraints();

        // Ambil beberapa hewan untuk diberi riwayat medis
        $luna = Animal::where('name', 'Luna')->first();
        $max  = Animal::where('name', 'Max')->first();

        if ($luna) {
            MedicalRecord::create([
                'animal_id'   => $luna->id,
                'title'       => 'Vaksin Rabies',
                'notes'       => 'Vaksinasi rabies pertama. Tidak ada reaksi alergi.',
                'record_date' => now()->subMonths(2),
            ]);

            MedicalRecord::create([
                'animal_id'   => $luna->id,
                'title'       => 'Checkup Rutin',
                'notes'       => 'Kesehatan baik. Berat badan ideal. Direkomendasikan vitamin.',
                'record_date' => now()->subMonth(),
            ]);
        }

        if ($max) {
            MedicalRecord::create([
                'animal_id'   => $max->id,
                'title'       => 'Vaksin DHPPi',
                'notes'       => 'Vaksin lengkap DHPPi. Respon baik.',
                'record_date' => now()->subMonths(3),
            ]);

            MedicalRecord::create([
                'animal_id'   => $max->id,
                'title'       => 'Sterilisasi',
                'notes'       => 'Proses sterilisasi berhasil. Recovery normal.',
                'record_date' => now()->subMonth(),
            ]);
        }

        $this->command->info('✅ Medical records seeded: 4 records');
    }
}