<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Species::truncate();
        Schema::enableForeignKeyConstraints();

        $species = [
            [
                'name'        => 'Kucing',
                'description' => 'Hewan peliharaan berbulu yang lucu, mandiri, dan penyayang. Cocok untuk apartemen atau rumah.',
            ],
            [
                'name'        => 'Anjing',
                'description' => 'Sahabat setia manusia yang penuh energi dan loyal. Membutuhkan ruang bermain yang cukup.',
            ],
            [
                'name'        => 'Kelinci',
                'description' => 'Hewan kecil berbulu yang jinak dan tenang. Mudah dirawat dan tidak berisik.',
            ],
            [
                'name'        => 'Hamster',
                'description' => 'Hewan mini yang aktif dan menggemaskan. Cocok untuk anak-anak dan pemula.',
            ],
        ];

        foreach ($species as $item) {
            Species::create($item);
        }

        $this->command->info('✅ Species seeded: 4 types');
    }
}