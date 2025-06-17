<?php

namespace App\Filament\Resources\NavbarResource\Pages;

use App\Filament\Resources\NavbarResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNavbars extends ManageRecords
{
    protected static string $resource = NavbarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
