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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->enum('kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('nama_wali')->nullable();
            $table->string  ('no_hp_wali')->nullable();
            $table->integer('hafalan')->default(0);
            $table->date('tanggal_masuk')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
