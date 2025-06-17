<?php

namespace App\Filament\Resources\LembagaResource\Pages;

use App\Filament\Resources\LembagaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLembaga extends CreateRecord
{
    protected static string $resource = LembagaResource::class;

         protected function getRedirectUrl(): string
    {
        return url('/admin/lembagas'); // Ganti dengan URL tujuan setelah create sukses
    }
}
