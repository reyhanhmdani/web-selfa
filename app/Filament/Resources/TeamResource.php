<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Team;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeamResource\RelationManagers;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationGroup = 'Database SELFA';
    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama'),
                TextInput::make('position')->required()->label('Posisi'),
                FileUpload::make('photo')->image()->directory('teams')->required()->label('Foto')
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->photo) {
                            Storage::disk('public')->delete($record->photo);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    }),
                TextInput::make('facebook')->label('Facebook')->url()->nullable(),
                TextInput::make('twitter')->label('Twitter')->url()->nullable(),
                TextInput::make('instagram')->label('Instagram')->url()->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')->label('Foto')->width(50),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('position')->label('Jabatan'),

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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
