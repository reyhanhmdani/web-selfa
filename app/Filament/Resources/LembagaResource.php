<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lembaga;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LembagaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LembagaResource\RelationManagers;

class LembagaResource extends Resource
{
    protected static ?string $model = Lembaga::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Database SELFA';
    protected static ?string $navigationLabel = 'Lembaga Cabang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_lembaga')
                    ->label('Nama Lembaga')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                FileUpload::make('logo')
                    ->label('Logo Lembaga')
                    ->image()
                    ->directory('logos/lembaga')
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->logo && Storage::disk('public')->exists($record->logo)) {
                            Storage::disk('public')->delete($record->logo);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    })
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->maxSize(2048),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo'),
                // ->circular(),

                TextColumn::make('nama_lembaga')
                    ->label('Nama Lembaga')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListLembagas::route('/'),
            'create' => Pages\CreateLembaga::route('/create'),
            'edit' => Pages\EditLembaga::route('/{record}/edit'),
        ];
    }
}
