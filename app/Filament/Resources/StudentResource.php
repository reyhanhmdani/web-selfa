<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Doctrine\DBAL\Schema\Column;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Widgets\CalonSantriNotification;
use App\Filament\Resources\StudentResource\RelationManagers;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // ⬇ Tambahkan navigation group
    protected static ?string $navigationGroup = 'Database Member';
    protected static ?string $navigationLabel = 'Para Santri';

    protected static ?string $pluralLabel = 'Santri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Santri')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'calon' => 'Calon Santri',
                        'santri' => 'Santri',
                        'alumni' => 'Alumni',
                        'nonaktif' => 'Nonaktif',
                    ])
                    ->default('calon')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Forms\Components\Select::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nama_wali')
                    ->label('Nama Wali')
                    ->maxLength(255),

                Forms\Components\TextInput::make('no_hp_wali')
                    ->label('No HP Wali')
                    ->maxLength(15),

                Forms\Components\TextInput::make('hafalan')
                    ->label('Hafalan (Juz)')
                    ->numeric()
                    ->rules(['min:1', 'max:30']),

                Forms\Components\Select::make('angkatan')
                    ->label('Angkatan')
                    ->options([
                        1 => 'Angkatan 1',
                        2 => 'Angkatan 2',
                        3 => 'Angkatan 3',
                        4 => 'Angkatan 4',
                        5 => 'Angkatan 5',
                        6 => 'Angkatan 6',
                        7 => 'Angkatan 7',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('images')
                    ->label('Dokumen Santri')
                    ->multiple() // Mengizinkan banyak file
                    ->directory('documents/santri') // Menyimpan ke folder khusus
                    ->preserveFilenames()
                    ->maxFiles(10) // Maksimal 10 file
                    ->acceptedFileTypes(['application/pdf', 'image/png', 'image/jpeg']) // Hanya menerima PDF & gambar
                    ->downloadable()
                    ->openable(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                // TextColumn::make('no')->state(
                //     static function (HasTable $livewire, stdClass $rowLoop): string {
                //         return (string) (
                //             $rowLoop->iteration +
                //             ($livewire->getTableRecordsPerPage() * (
                //                 $livewire->getTablePage() - 1
                //             ))
                //         );
                //     }
                // ),
                TextColumn::make('name')
                    ->label('Nama Santri')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'calon',
                        'success' => 'santri',
                        'danger' => 'alumni',
                        'secondary' => 'nonaktif',
                    ])
                    ->sortable(),

                TextColumn::make('angkatan')
                    ->label('Angkatan')
                    ->sortable(),

                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable(),

                TextColumn::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->searchable(),

                TextColumn::make('alamat')
                    ->label('Alamat'),

                TextColumn::make('nama_wali')
                    ->label('Nama Wali'),

                TextColumn::make('no_hp_wali')
                    ->label('No HP Wali'),

                TextColumn::make('hafalan')
                    ->label('Hafalan (Juz)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('images')
                    ->label('Dokumen')
                    ->formatStateUsing(function ($state) {
                        // Jika data kosong, tampilkan "Tidak ada dokumen"
                        if (!$state) {
                            return 'Tidak ada dokumen';
                        }

                        // Cek apakah data sudah berupa array atau masih string
                        if (is_string($state)) {
                            // Jika string, pecah berdasarkan koma dan hapus spasi ekstra
                            $files = array_map('trim', explode(',', $state));
                        } else {
                            // Jika sudah array (misalnya setelah diperbaiki di database)
                            $files = $state;
                        }

                        // Jika array kosong, tampilkan "Tidak ada dokumen"
                        if (empty($files)) {
                            return 'Tidak ada dokumen';
                        }

                        return 'Lihat Dokumen (' . count($files) . ')';
                    })
                    ->icon('heroicon-o-document')
                    ->color('primary')
                    ->url(fn($record) => route('santri.documents', ['id' => $record->id]), true) // Menuju route yang menampilkan dokumen
                    ->openUrlInNewTab(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'calon' => 'Calon Santri',
                        'santri' => 'Santri',
                        'alumni' => 'Alumni',
                        'nonaktif' => 'Nonaktif',
                    ]),

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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    // public static function getLabel(): ?string
    // {
    //     $locale = app()->getLocale();

    //     if ($locale == 'id') {
    //         return 'Santri';
    //     } else {
    //         return 'Students';
    //     }
    // }
}
