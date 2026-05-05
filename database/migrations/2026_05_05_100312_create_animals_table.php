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
        Schema::create('animals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('species_id')->constrained()->cascadeOnDelete();
        $table->string('name');
        $table->enum('gender', ['Jantan', 'Betina']);
        $table->integer('age_months')->default(0);
        $table->text('description')->nullable();
        $table->string('photo')->nullable();     // path foto
        $table->enum('status', ['available', 'pending', 'adopted'])
              ->default('available');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
