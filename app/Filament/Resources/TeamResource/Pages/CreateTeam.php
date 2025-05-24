<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

        protected function getRedirectUrl(): string
    {
        return url('/admin/teams'); // Ganti dengan URL tujuan setelah create sukses
    }
}
