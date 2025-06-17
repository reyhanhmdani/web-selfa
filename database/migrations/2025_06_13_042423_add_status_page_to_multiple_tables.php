<?php
// database/migrations/YYYY_MM_DD_add_status_to_multiple_tables.php

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
        // Daftar tabel yang ingin ditambahkan kolom 'status_page'
        $tables = [
            'abouts',
            'blogs',
            'contact_infos',
            'footers',
            'galeri_foto',
            'lembagas',
            'navbars',
            'programs',
            'section_headers',
            'teams',
            'visimisis',
            // Tambahkan tabel lain di sini jika diperlukan
        ];

        foreach ($tables as $tableName) {
            // Pastikan tabel ada sebelum mencoba memodifikasinya
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) use ($tableName) { // Gunakan `use ($tableName)` untuk akses variabel
                    // Hanya tambahkan kolom jika belum ada, untuk mencegah error jika migrasi dijalankan ulang
                    if (!Schema::hasColumn($tableName, 'status_page')) {
                        // Perbaikan: Tambahkan nilai default untuk kolom ENUM
                        $table->enum('status_page', ['utama', 'ponpes', 'sd', 'tk_kb'])->default('utama')->after('id');
                        // Atau, jika Anda ingin bisa NULL:
                        // $table->enum('status_page', ['utama', 'ponpes', 'sd', 'tk_kb'])->nullable()->after('id');
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'abouts',
            'blogs',
            'contact_infos',
            'footers',
            'galeri_foto',
            'lembagas',
            'navbars',
            'programs',
            'section_headers',
            'teams',
            'visimisis',
        ];

        foreach ($tables as $tableName) {
            // Perbaikan: Periksa keberadaan kolom dengan nama yang benar ('status_page')
            if (Schema::hasTable($tableName) && Schema::hasColumn($tableName, 'status_page')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn('status_page');
                });
            }
        }
    }
};
