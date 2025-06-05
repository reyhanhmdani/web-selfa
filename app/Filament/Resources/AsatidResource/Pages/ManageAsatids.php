<?php

namespace App\Filament\Resources\AsatidResource\Pages;

use App\Filament\Resources\AsatidResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAsatids extends ManageRecords
{
    protected static string $resource = AsatidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
