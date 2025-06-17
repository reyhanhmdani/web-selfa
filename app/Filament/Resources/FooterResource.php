<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterResource\Pages;
use App\Filament\Resources\FooterResource\RelationManagers;
use App\Models\Footer;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterResource extends Resource
{
    protected static ?string $model = Footer::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Section Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar Footer')
                    ->description('Pengaturan umum untuk bagian footer.')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description') // Ganti dengan RichEditor jika ingin formatting
                            ->maxLength(65535)
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

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
                    ->columnSpanFull(),

                Forms\Components\Section::make('Tautan Media Sosial')
                    ->description('Tambahkan atau edit tautan media sosial. Pilih platform dan masukkan URL.')
                    ->schema([
                        Repeater::make('social_links')
                            ->schema([
                                Select::make('platform')
                                    ->options([
                                        'facebook' => 'Facebook',
                                        'instagram' => 'Instagram',
                                        'twitter' => 'Twitter (X)',
                                        'youtube' => 'YouTube',
                                        'linkedin' => 'LinkedIn',
                                        'github' => 'GitHub',
                                        'tiktok' => 'TikTok',
                                        // Tambahkan platform lain sesuai kebutuhan
                                    ])
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->label('Platform Media Sosial'),
                                TextInput::make('url')
                                    ->label('URL')
                                    ->url() // Validasi URL
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(0) // Default tidak ada item, tambah manual
                            ->minItems(0)
                            ->addActionLabel('Tambah Tautan Sosial')
                            ->collapsed()
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Tautan Info Pondok')
                    ->description('Tautan yang ditampilkan di kolom "Info Pondok".')
                    ->schema([
                        Repeater::make('pondok_info_links')
                            ->label('Daftar Tautan')
                            ->schema([
                                TextInput::make('label')
                                    ->label('Nama Tautan'),
                                TextInput::make('url')
                                    ->label('URL'),
                            ])
                            ->defaultItems(1) // Bisa diisi default 5 item sesuai data statis
                            ->minItems(0)
                            ->addActionLabel('Tambah Tautan Info Pondok')
                            ->collapsed()
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Tautan Informasi Lainnya')
                    ->description('Tautan yang ditampilkan di kolom "Informasi".')
                    ->schema([
                        Repeater::make('information_links')
                            ->label('Daftar Tautan')
                            ->schema([
                                TextInput::make('label')
                                    ->label('Nama Tautan'),
                                TextInput::make('url')
                                    ->label('URL'),
                            ])
                            ->defaultItems(1) // Bisa diisi default 4 item sesuai data statis
                            ->minItems(0)
                            ->addActionLabel('Tambah Tautan Informasi')
                            ->collapsed()
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Informasi Kontak')
                    ->description('Detail kontak yang akan ditampilkan di footer.')
                    ->schema([
                        TextInput::make('address')
                            ->maxLength(255)
                            ->label('Alamat Lengkap')
                            ->default('Jl. Wahidin Sudiro Husodo No.36, Bramen, Sekarsuli, Kec. Klaten Utara, Kabupaten Klaten, Jawa Tengah 57438'),
                        TextInput::make('phone')
                            ->tel() // Validasi telepon
                            ->maxLength(255)
                            ->label('Nomor Telepon (WhatsApp)')
                            ->helperText('Contoh: 6285217176495 (tanpa tanda + atau -)')
                            ->default('6285217176495'),
                        TextInput::make('email')
                            ->email() // Validasi email
                            ->maxLength(255)
                            ->label('Email')
                            ->default('ponpes.sayfelfalah@gmail.com'),
                    ])->columns(1), // Ubah ke 1 kolom agar lebih rapi untuk input panjang
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
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
                    ->searchable() // Memungkinkan pencarian berdasarkan status
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ManageFooters::route('/'),
        ];
    }
}
