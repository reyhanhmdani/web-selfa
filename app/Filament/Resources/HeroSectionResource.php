<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HeroSection;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\HeroSectionResource\Pages;
use App\Filament\Resources\HeroSectionResource\Pages\ManageHeroSections;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-chevron-double-up';

    protected static ?string $navigationGroup = 'Section Web';
    protected static ?string $pluralLabel = 'Bagian awal';

  public static function form(Form $form): Form
{
    return $form
        ->schema([
            Select::make('status_page')
                ->label('Tampilkan di Halaman')
                ->options([
                    'utama' => 'Utama',
                    'ponpes' => 'Pondok Pesantren',
                    'sd' => 'SD',
                    'tk_kb' => 'TK/KB',
                ])
                ->required(),

            TextInput::make('title')
                ->label('Judul Utama')
                ->required(),

            Textarea::make('subtitle')
                ->label('Subtitle / Tagline')
                ->rows(3),

            Repeater::make('buttons')
                ->label('Tombol Aksi')
                ->schema([
                    TextInput::make('text')->label('Teks Tombol')->required(),
                    TextInput::make('url')->label('URL Tombol')->required(),
                    // Anda bisa tambahkan Select untuk gaya tombol jika perlu
                ])
                ->columns(2)
                ->maxItems(2), // Batasi hanya 2 tombol

            FileUpload::make('background_images')
                ->label('Gambar Latar Slider')
                ->multiple() // Izinkan upload banyak gambar
                ->directory('hero-backgrounds')
                ->image()
                ->imageEditor()
                ->reorderable(),
        ]);
}

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('title')->label('Judul'),
            TextColumn::make('status_page')->label('Halaman'),
        ])
        ->filters([
            //
        ])
        ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            // ...
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageHeroSections::route('/'),
        ];
    }
}
