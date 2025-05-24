<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\About;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AboutResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutResource\RelationManagers;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Tentang Ponpes Section';
    protected static ?string $pluralLabel = 'Tentang Ponpes Section';

    protected static ?string $navigationGroup = 'Section Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title_section')
                    ->label('Judul Section')
                    ->required()
                    ->maxLength(255),

                TextInput::make('sub_title')
                    ->label('Sub Judul Section')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(5),

                FileUpload::make('image_1')
                    ->label('Gambar 1')
                    ->image()
                    ->directory('about-images')
                    ->maxSize(2048) // Maks 2MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->image_1 && Storage::disk('public')->exists($record->image_1)) {
                            Storage::disk('public')->delete($record->image_1);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    })
                    ->required(),
                FileUpload::make('image_2')
                    ->label('Gambar 2')
                    ->image()
                    ->directory('about-images')
                    ->maxSize(2048) // Maks 2MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->image_2 && Storage::disk('public')->exists($record->image_2)) {
                            Storage::disk('public')->delete($record->image_2);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_section')
                    ->label('Judul Section'),
                TextColumn::make('sub_title')
                    ->label('Sub Judul Section'),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),
                ImageColumn::make('image_1')
                    ->label('Gambar 1'),
                ImageColumn::make('image_2')
                    ->label('Gambar 2'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAbouts::route('/'),
        ];
    }
}
