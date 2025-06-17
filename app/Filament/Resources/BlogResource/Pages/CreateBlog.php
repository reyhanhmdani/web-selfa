<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

     protected function getRedirectUrl(): string
    {
        return url('/admin/blogs'); // Ganti dengan URL tujuan setelah create sukses
    }
}
