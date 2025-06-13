<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'social_links',
        'address',
        'phone',
        'email',
        'pondok_info_links',
        'information_links'
    ];
     protected $casts = [
        'social_links' => 'array',
        'pondok_info_links' => 'array',
        'information_links' => 'array',
    ];

      public static function getSingleton(): static
    {
        return static::firstOrCreate(
            [], // Cari yang pertama
            [   // Jika tidak ada, buat dengan nilai default
                'title' => 'Ponpes Selfa',
                'description' => 'Pondok Pesantren Selfa, membentuk generasi Qur\'ani yang berakhlak mulia, berwawasan luas, dan mandiri.',
                'social_links' => [],
                'address' => 'Jl. Wahidin Sudiro Husodo No.36, Bramen, Sekarsuli, Kec. Klaten Utara, Kabupaten Klaten, Jawa Tengah 57438',
                'phone' => '6285217176495',
                'email' => 'ponpes.sayfelfalah@gmail.com',
                'pondok_info_links' => [
                    ['label' => 'Sejarah', 'url' => '#'],
                    ['label' => 'Visi & Misi', 'url' => '#'],
                    ['label' => 'Struktur Organisasi', 'url' => '#'],
                    ['label' => 'Fasilitas', 'url' => '#'],
                    ['label' => 'Prestasi', 'url' => '#'],
                ],
                'information_links' => [
                    ['label' => 'Pendaftaran', 'url' => '#'],
                    ['label' => 'Kalender Akademik', 'url' => '#'],
                    ['label' => 'Beasiswa', 'url' => '#'],
                    ['label' => 'FAQ', 'url' => '#'],
                ],
            ]
        );
    }
}
