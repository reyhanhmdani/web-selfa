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
        Schema::create('hero_sections', function (Blueprint $table) {
             $table->id();
            $table->string('title');
            $table->text('subtitle');

            // Kolom JSON untuk menyimpan data tombol yang fleksibel
            $table->json('buttons')->nullable();

            // Kolom JSON untuk menyimpan banyak gambar latar
            $table->json('background_images')->nullable();

            // Kolom enum sesuai permintaan Anda
            $table->enum('status_page', ['utama', 'ponpes', 'sd', 'tk_kb']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};