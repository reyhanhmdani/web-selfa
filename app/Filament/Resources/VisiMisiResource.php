<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Tables;
use App\Models\VisiMisi;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisiMisiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisiMisiResource\RelationManagers;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Visi Misi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Foto')
                    ->directory('visimisi')
                    ->image()
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    })
                    ->required(),
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
                    ->columnSpanFull(), // Agar field ini mengambil lebar penuh

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageVisiMisis::route('/'),
        ];
    }
}
