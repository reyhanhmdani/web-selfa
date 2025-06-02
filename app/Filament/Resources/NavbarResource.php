<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavbarResource\Pages;
use App\Models\Navbar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                Tables\Columns\ImageColumn::make('logo')->label('Logo'),
                Tables\Columns\TextColumn::make('title')->label('Judul Website'),
                Tables\Columns\TextColumn::make('navigation')
                    ->formatStateUsing(fn($state) => json_encode($state, JSON_PRETTY_PRINT))
                    ->label('Navigasi')
                    ->wrap(),
            ])
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
