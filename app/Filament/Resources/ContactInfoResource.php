<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ContactInfo;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactInfoResource\Pages;
use App\Filament\Resources\ContactInfoResource\RelationManagers;
use App\Filament\Resources\ContactInfoResource\Pages\ManageContactInfos;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Kontak Info';
    protected static ?string $navigationGroup = 'Informasi Umum';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('key')
                ->label('Tipe Kontak')
                ->options([
                    'alamat' => 'Alamat',
                    'telepon' => 'Telepon',
                    'email' => 'Email',
                    'jam' => 'Jam Operasional',
                    'instagram' => 'Instagram',
                    'facebook' => 'Facebook',
                ])
                ->required(),

            Textarea::make('value')
                ->label('Isi')
                ->rows(5)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('key')->label('Tipe')->searchable(),
            TextColumn::make('value')->label('Isi')->limit(40),
        ])
            ->defaultSort('key')
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
            'index' => Pages\ManageContactInfos::route('/'),
        ];
    }
}
