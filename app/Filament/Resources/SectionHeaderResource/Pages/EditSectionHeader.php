<?php

namespace App\Filament\Resources\SectionHeaderResource\Pages;

use App\Filament\Resources\SectionHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionHeader extends EditRecord
{
    protected static string $resource = SectionHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
