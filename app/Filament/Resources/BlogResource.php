<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Blog Pondok';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->directory('blog/blogs')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->deleteUploadedFileUsing(function ($record) {
                        // Hapus file lama jika ada
                        if ($record && $record->image && Storage::disk('public')->exists($record->image)) {
                            Storage::disk('public')->delete($record->image);
                        }
                    })
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        return time() . '-' . $file->getClientOriginalName();
                    })
                    ->maxSize(2048)
                    ->required(),
                RichEditor::make('content')
                    ->toolbarButtons(['bold', 'italic', 'underline', 'undo', 'redo', 'orderedList'])
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('instagram_link')
                    ->label('Instagram Link')
                    ->url()
                    ->placeholder('https://www.instagram.com/post')
                    ->maxLength(255)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('instagram_link')
                    ->label('Instagram')
                    ->url(fn($record) => $record->instagram_link) // Link langsung bisa diklik
                    ->openUrlInNewTab()
                    ->limit(50),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
