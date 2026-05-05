<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adoptions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->string('full_name');           // nama sesuai KTP
        $table->text('ktp_address');           // alamat sesuai KTP
        $table->string('house_photo');         // path foto rumah
        $table->text('reason');                // alasan mengadopsi
        $table->enum('status', ['pending', 'approved', 'rejected'])
              ->default('pending');
        $table->text('admin_note')->nullable(); // catatan dari admin saat tolak/setuju
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
