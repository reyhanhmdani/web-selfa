<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SectionHeader;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionHeaderResource\Pages;
use App\Filament\Resources\SectionHeaderResource\RelationManagers;

class SectionHeaderResource extends Resource
{
    protected static ?string $model = SectionHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('section_key')
                    ->label('Kunci Section (ex: program, galeri)')
                    ->required()
                    ->unique(ignorable: fn($record) => $record),

                TextInput::make('title')
                    ->label('Judul Section')
                    ->required(),

                TextInput::make('subtitle')
                    ->label('Subjudul Section')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section_key')
                    ->label('Kunci Section')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Judul Section')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subtitle')
                    ->label('Subjudul Section')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectionHeaders::route('/'),
            'create' => Pages\CreateSectionHeader::route('/create'),
            'edit' => Pages\EditSectionHeader::route('/{record}/edit'),
        ];
    }
}
