<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavbarResource\Pages;
use App\Models\Navbar;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NavbarResource extends Resource
{
    protected static ?string $model = Navbar::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $navigationGroup = 'Section Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->image()
                    ->directory('navbars')
                    ->nullable()
                    ->label('Logo'),
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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Website'),
                Forms\Components\Repeater::make('navigation')
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->maxLength(255)
                            ->label('Label'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Nama Ikon (Font Awesome)')
                            ->placeholder('contoh: home, info-circle, envelope')
                            ->maxLength(50)
                            ->helperText('Hanya isi nama ikon Font Awesome tanpa "fa-solid fa-"')
                            ->nullable(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'link' => 'Internal Link',
                                'external' => 'External Link',
                                'anchor' => 'Anchor Link',
                                'dropdown' => 'Dropdown',
                            ])
                            ->required()
                            ->label('Tipe')
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('children', [])),
                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->maxLength(255)
                            ->label('URL')
                            ->hidden(fn($get) => $get('type') === 'dropdown'),
                        Forms\Components\Toggle::make('button')
                            ->label('Tampilkan sebagai Tombol')
                            ->hidden(fn($get) => $get('type') === 'dropdown'),
                        Forms\Components\Repeater::make('children')
                            ->schema([
                                Forms\Components\TextInput::make('label')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Label Submenu'),
                                Forms\Components\Select::make('type')
                                    ->options([
                                        'link' => 'Internal Link',
                                        'external' => 'External Link',
                                        'anchor' => 'Anchor Link',
                                    ])
                                    ->required()
                                    ->label('Tipe Submenu'),
                                Forms\Components\TextInput::make('url')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('URL Submenu'),
                            ])
                            ->hidden(fn($get) => $get('type') !== 'dropdown')
                            ->label('Submenu')
                            ->collapsible(),
                    ])
                    ->collapsible()
                    ->itemLabel(fn(array $state): ?string => $state['label'] ?? null)
                    ->label('Navigasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->label('Logo'),
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
                    ->searchable()
                    ->sortable(),
            ])
            // ... (filters, actions, bulkActions)
            ->filters([
                // Opsional: Tambahkan filter untuk status_page
                Tables\Filters\SelectFilter::make('status_page')
                    ->options([
                        'utama' => 'Halaman Utama',
                        'ponpes' => 'Halaman Ponpes',
                        'sd' => 'Halaman SD',
                        'tk&kb' => 'Halaman TK & KB',
                    ])
                    ->label('Filter Halaman Tampil'),
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

    public static function canCreate(): bool
    {
        return Navbar::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNavbars::route('/'),
        ];
    }
}
