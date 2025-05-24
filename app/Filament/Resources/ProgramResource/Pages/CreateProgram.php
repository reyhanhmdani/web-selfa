<?php

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Filament\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

        protected function getRedirectUrl(): string
    {
        return url('/admin/programs'); // Ganti dengan URL tujuan setelah create sukses
    }
}
