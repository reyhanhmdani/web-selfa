<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Database SELFA';

    protected static ?string $navigationLabel = 'Ustad dan Ustadzah';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Guru')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('hafalan')
                    ->label('Hafalan (Juz)')
                    ->required()
                    ->numeric()
                    ->rules(['min:1', 'max:30']),

                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Forms\Components\TextArea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(500),

                Forms\Components\Select::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('images')
                    ->label('Dokumen Guru')
//                    ->storeFiles()
                    ->preserveFilenames(),
//                    ->disk('public')
//                    ->directory('teacher-documents')
//                    ->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Guru')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('hafalan')
                    ->label('Hafalan (Juz)')
                    ->sortable(),

                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable(),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50),

                TextColumn::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->searchable(),

                TextColumn::make('images')
                    ->label('Dokumen Guru')
                    ->width(200)
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->images))
                    ->extraAttributes(['style' => 'cursor: pointer;'])
                    ->formatStateUsing(fn ($state) => "<a href='{$state}' target='_blank'>Document</a>")
                    ->html(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tombol hapus
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
