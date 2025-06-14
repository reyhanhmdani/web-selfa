<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\GaleriFoto;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\GaleriFotoResource\Pages;

use Filament\Forms\Get;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GaleriFotoResource extends Resource
{
    protected static ?string $model = GaleriFoto::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $pluralLabel = 'Galeri Foto';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->directory('galeri-foto')
                    ->required(),
                Select::make('status_page')
                    ->label('Tampilkan di Halaman')
                    ->options([
                        'utama' => 'Halaman Utama',
                        'ponpes' => 'Halaman Ponpes',
                        'sd' => 'Halaman SD',
                        'tk&kb' => 'Halaman TK & KB',
                    ])
                    ->default('utama') // Nilai default
                    ->required() // Opsional, tergantung apakah status page harus selalu diisi
                    ->native(false) // Membuat dropdown lebih stylis di Filament
                    ->columnSpanFull(),

                TextInput::make('order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(fn(Get $get) => GaleriFoto::max('order') + 1),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Foto')->square(),
                TextColumn::make('status_page')
                    ->label('Tampil di')
                    ->badge() // Menampilkan sebagai badge (lebih visual)
                    ->color(fn (string $state): string => match ($state) {
                        'utama' => 'success', // Hijau
                        'ponpes' => 'info',    // Biru
                        'sd' => 'warning',   // Kuning
                        'tk&kb' => 'danger',  // Merah
                        default => 'secondary', // Abu-abu untuk nilai tak dikenal
                    })
                    ->searchable() // Memungkinkan pencarian berdasarkan status
                    ->sortable(),
                TextColumn::make('order')->label('Urutan')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGaleriFotos::route('/'),
        ];
    }
}
