<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')->schema([
                    TextInput::make('name')->required()->maxLength(255),
                    TextInput::make('phone')->required()->maxLength(255)->unique(ignoreRecord: true),
                    TextInput::make('email')->email()->required()->maxLength(255)->unique(ignoreRecord: true),
                    Select::make('role')->options([
                        'student' => 'Student',
                        'faculty' => 'Faculty',
                        'HoD' => 'HoD',
                        'Principle' => 'Principle',
                    ])->required()->default('student'),
                    FileUpload::make('image')->image()->directory('users')->nullable()->downloadable()->preserveFilenames()->openable(),
                    Textarea::make('address')->nullable(),
                    TextInput::make('password')->label('Password')
                        ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->password()->placeholder('********')->dehydrated(fn($state) => filled($state)),
                    DateTimePicker::make('email_verified_at')->label('Email Verified At')->default(now()),
                    Checkbox::make('is_admin')->label('Is Admin')->default(false),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('User Name')->searchable(),
                TextColumn::make('email')->label('User Email Id')->searchable(),
                TextColumn::make('phone')->label('User Phone')->searchable(),
                ImageColumn::make('image')->square(),
                SelectColumn::make('role')->options([
                    'student' => 'Student',
                    'faculty' => 'Faculty',
                    'HoD' => 'HoD',
                    'Principle' => 'Principle',
                ])->searchable()->sortable(),
                IconColumn::make('is_admin')->boolean()->label('Is Admin')->sortable(),
                TextColumn::make('email_verified_at')->dateTime()->sortable(),
                TextColumn::make('address')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')->options([
                    'student' => 'Student',
                    'faculty' => 'Faculty',
                    'HoD' => 'HoD',
                    'Principle' => 'Principle',
                ])->label('Role')->searchable()->preload()->indicator("role"),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}