<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'buttons',
        'background_images',
        'status_page',
    ];

    // TAMBAHKAN INI
    protected $casts = [
        'buttons' => 'array',
        'background_images' => 'array',
    ];
}
