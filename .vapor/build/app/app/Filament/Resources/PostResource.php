<?php

namespace App\Filament\Resources;

use App\Filament\Exports\PostExporter;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationLabel = 'Blogs';
    protected static ?string $slug = 'blogs-and-news';
    protected static ?string $modelLabel = 'Blog';
    protected static ?string $navigationGroup = 'Blogs and News';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Post Information')->schema([
                    FileUpload::make('image')->required()->label('Post Image')->image()->acceptedFileTypes(['image/*'])
                        ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                        ->directory('posts/image')->downloadable()->preserveFilenames()->openable()->columnSpanFull(),
                    TextInput::make('title')->label('Post Title')->required()->maxLength(150)->minLength(1)->live()
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')->unique(ignoreRecord: true)->required(),
                    Select::make('user_id')->label('Author')->relationship('user', 'name')->required(),
                    MarkdownEditor::make('content')->label('Post Content')->required()->columnSpanFull(),
                ])->columns(3)->collapsible(),
                Section::make('Post Settings')->schema([
                    TagsInput::make('tags')->label('Tags')->required()->columnSpanFull(),
                    Select::make('category_id')->label('Category')->relationship('category', 'name')->required()->preload()->searchable(),
                    ToggleButtons::make('published')->label('Publish the post')->boolean()->inline()->default(false),
                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Post Image')->searchable()->sortable()->circular(),
                TextColumn::make('title')->label('Post Title')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Author')->searchable()->sortable(),
                // TextColumn::make('posts.name')->label('')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])->headerActions([
                    ExportAction::make()->exporter(PostExporter::class),
                ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
