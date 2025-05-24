<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalonSantriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Route::get('/', [BlogController::class, 'index'])->name('index');

// Untuk menampilkan Semua gambar dalam satu link
Route::get('/santri/{id}/documents', function ($id) {
    $santri = Student::findOrFail($id);
    $files = is_array($santri->images) ? $santri->images : json_decode($santri->images, true);
    return view('documents', compact(   'santri', 'files'));
})->name('santri.documents');



Route::get('/', [LandingController::class, 'index']);

// Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.form');
Route::post('/pendaftaran', [PendaftaranController::class, 'submit'])->name('pendaftaran.submit');
