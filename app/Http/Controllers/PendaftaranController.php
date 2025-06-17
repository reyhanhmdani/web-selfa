<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Illuminate\Notifications\DatabaseNotification;

class PendaftaranController extends Controller
{

    public function index()
    {
        return view('pages.daftar');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'nama_wali' => 'nullable|string|max:255',
            'no_hp_wali' => 'nullable|string|max:20',
            'hafalan' => 'nullable|integer|min:0|max:30',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // Ubah jenis kelamin ke kode ('L' / 'P') untuk field `kelamin`
        $kelamin = $validated['jenis_kelamin'] === 'Laki-laki' ? 'L' : 'P';

        // Upload foto jika ada
        $fotoPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $foto) {
                $fotoPaths[] = $foto->store('pendaftaran/images', 'public');
            }
        }

        $student = Student::create([
            'status' => 'calon',
            'name' => $validated['name'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'kelamin' => $kelamin,
            'alamat' => $validated['alamat'],
            'nama_wali' => $validated['nama_wali'] ?? null,
            'no_hp_wali' => $validated['no_hp_wali'] ?? null,
            'hafalan' => $validated['hafalan'] ?? 0,
            'angkatan' => 1, // default angkatan
            'images' => !empty($fotoPaths) ? json_encode($fotoPaths) : null,
        ]);


        $recipient = auth()->user() ?? User::where('email', 'admin@gmail.com')->first();
        if ($recipient) {
            DatabaseNotification::create([
                'id' => Str::uuid(),
                'type' => 'Filament\Notifications\DatabaseNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => $recipient->id,
                'data' => [
                    'title' => 'Santri ' . $validated['name'] . ' telah mendaftar',
                    'body' => 'Silakan periksa data pendaftaran di dashboard.',
                    'icon' => 'heroicon-o-check-circle',
                    'iconColor' => 'success',
                    'status' => 'success',
                    'actions' => [
                        [
                            'name' => 'view',
                            'label' => 'Lihat Detail',
                            'url' => route('filament.admin.resources.students.edit', ['record' => $student->id]),
                            'button' => true,
                        ],
                    ],
                    'duration' => 'persistent',
                    'view' => 'filament-notifications::notification',
                    'viewData' => [],
                    'format' => 'filament',
                ],
            ]);
        }

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim! Kami akan menghubungi Anda secepatnya.');
    }
}
