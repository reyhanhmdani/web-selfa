<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Student;
use App\Models\GaleriFoto;

class Dashboard extends Page
{

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';

    public function getSantriCount(): int
    {
        return Student::count();
    }

    public function getFotoCount(): int
    {
        return GaleriFoto::count();
    }
}
