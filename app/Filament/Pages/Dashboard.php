<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
// Jika Anda punya widget lain, impor juga di sini
// use App\Filament\Resources\ProductResource\Widgets\ProductStatsOverview;

class Dashboard extends BaseDashboard
{
    /**
     * Ubah 'protected' menjadi 'public' di sini.
     */
    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            FilamentInfoWidget::class,
            // ProductStatsOverview::class, // Aktifkan jika Anda punya widget kustom
        ];
    }
}
