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
        Schema::create('footers', function (Blueprint $table) {
           $table->id();
            $table->string('title')->default('Ponpes Selfa'); // Judul utama footer
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->json('social_links')->nullable(); // Menyimpan array objek { platform: 'facebook', url: '...' }

            // Informasi Kontak - bisa disatukan juga ke JSON, tapi dipisah agar lebih eksplisit jika hanya sedikit
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Kolom untuk tautan "Info Pondok" dan "Informasi"
            // Ini bisa jadi JSON juga jika ada banyak tautan,
            // atau bisa disimpan sebagai teks jika isinya statis
            $table->json('pondok_info_links')->nullable();
            $table->json('information_links')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
