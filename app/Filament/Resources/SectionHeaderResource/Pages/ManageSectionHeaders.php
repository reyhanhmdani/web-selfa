<?php

namespace App\Filament\Resources\SectionHeaderResource\Pages;

use App\Filament\Resources\SectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSectionHeaders extends ManageRecords
{
    protected static string $resource = SectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
