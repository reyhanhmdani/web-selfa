<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalonSantriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SantriExportControler;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Route::get('/', [BlogController::class, 'index'])->name('index');

// Untuk menampilkan Semua gambar dalam satu link
Route::get('/santri/{id}/documents', function ($id) {
    $santri = Student::findOrFail($id);
    $files = is_array($santri->images) ? $santri->images : json_decode($santri->images, true);
    return view('documents', compact('santri', 'files'));
})->name('santri.documents');

Route::get('/santri/export/pdf', [SantriExportControler::class, 'exportAllPdf'])->name('santri.export.all.pdf');
Route::get('/santri/{santri}/export-pdf', [SantriExportControler::class, 'exportPdf'])
    ->name('santri.export.pdf');
Route::get('/santri/export/excel', [SantriExportControler::class, 'exportExcel'])->name('santri.export.excel');


Route::get('/', [LandingController::class, 'index']);

// Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'submit'])->name('pendaftaran.submit');
