<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Asatid;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\AsatidResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AsatidResource\RelationManagers;
use App\Filament\Resources\AsatidResource\Pages\ManageAsatids;

class AsatidResource extends Resource
{
    protected static ?string $model = Asatid::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Database SELFA';
    protected static ?string $navigationLabel = 'Para Asatid';

    protected static ?string $pluralLabel = 'Santri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Ustad')
                    ->required()
                    ->maxLength(255),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'calon' => 'Calon Ustad/Ustadzah',
                        'asatid' => 'Ustad/Ustadzah',
                        'nonaktif' => 'Nonaktif',
                    ])
                    ->default('calon')
                    ->required(),

                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),

                Select::make('kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nama_wali')
                    ->label('Nama Wali')
                    ->maxLength(255),

                TextInput::make('no_hp_wali')
                    ->label('No HP Wali')
                    ->maxLength(15),

                TextInput::make('hafalan')
                    ->label('Hafalan (Juz)')
                    ->numeric()
                    ->rules(['min:1', 'max:30']),

                FileUpload::make('images')
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
                    ->url(fn($record) => route('documents', ['tipe' => 'asatid', 'id' => $record->id]), true)
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
                Tables\Actions\DeleteAction::make(),
                Action::make('print')
                    ->label('PDF')
                    ->icon('heroicon-o-printer')
                    ->url(fn($record) => route('santri.export.pdf', $record))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ManageAsatids::route('/'),
        ];
    }
}
