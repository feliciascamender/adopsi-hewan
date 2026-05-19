<?php

namespace Database\Seeders;

use App\Models\Adoption;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdoptionSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Adoption::truncate();
        // Jangan truncate adoption_details, Laravel otomatis handle via relationship
        \DB::table('adoption_details')->truncate();
        Schema::enableForeignKeyConstraints();

        $budi = User::where('email', 'budi@gmail.com')->first();
        $siti = User::where('email', 'siti@gmail.com')->first();

        // Adoption 1: Budi - Pending
        if ($budi) {
            $adoption1 = Adoption::create([
                'user_id'      => $budi->id,
                'full_name'    => 'Budi Santoso',
                'ktp_address'  => 'Jl. Lambung Mangkurat No. 5, Banjarmasin, Kalsel',
                'house_photo'  => 'dummy/house1.jpg', // Di production ini dari upload
                'reason'       => 'Saya ingin mengadopsi kucing karena saya pecinta hewan dan memiliki waktu luang yang cukup untuk merawatnya. Rumah saya luas dan aman untuk hewan peliharaan.',
                'status'       => 'pending',
            ]);

            // Budi pilih 2 hewan
            $luna  = Animal::where('name', 'Luna')->first();
            $mochi = Animal::where('name', 'Mochi')->first();
            if ($luna && $mochi) {
                $adoption1->animals()->attach([$luna->id, $mochi->id]);
            }
        }

        // Adoption 2: Siti - Approved
        if ($siti) {
            $adoption2 = Adoption::create([
                'user_id'      => $siti->id,
                'full_name'    => 'Siti Aminah',
                'ktp_address'  => 'Jl. Veteran No. 12, Banjarmasin, Kalsel',
                'house_photo'  => 'dummy/house2.jpg',
                'reason'       => 'Anak saya sangat menyukai kelinci dan kami ingin mengajarkan tanggung jawab merawat hewan sejak dini. Kami sudah menyiapkan kandang yang nyaman.',
                'status'       => 'approved',
                'admin_note'   => 'Pengajuan disetujui. Silakan hubungi shelter untuk pengambilan hewan.',
            ]);

            $snowy = Animal::where('name', 'Snowy')->first();
            if ($snowy) {
                $adoption2->animals()->attach([$snowy->id]);
                // Update status hewan jadi adopted
                $snowy->update(['status' => 'adopted']);
            }
        }

        $this->command->info('✅ Adoptions seeded: 2 adoptions (1 pending, 1 approved)');
    }
}