<?php

namespace App\Filament\Resources\StudentResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StudentResource;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export_excel')
                ->label('Export Excel')
                ->icon('heroicon-o-document-arrow-down')
                ->url(route('santri.export.excel'))
                ->openUrlInNewTab(),

            Action::make('export_pdf')
                ->label('Export PDF')
                ->icon('heroicon-o-printer')
                ->url(route('santri.export.all.pdf'))
                ->openUrlInNewTab(),
        ];
    }
}
