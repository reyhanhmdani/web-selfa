<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $fillable = ['logo', 'title', 'navigation', 'status_page'];

    protected $casts = [
        'navigation' => 'array',
    ];
}
