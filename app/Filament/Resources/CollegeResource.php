<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollegeResource\Pages;
use App\Filament\Resources\CollegeResource\RelationManagers;
use App\Models\College;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollegeResource extends Resource
{
    protected static ?string $model = College::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Affliated Colleges';
    protected static ?string $slug = 'affliated-colleges';
    protected static ?string $modelLabel = 'Affliated College';
    protected static ?string $navigationGroup = 'Affliated Institutions';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('College Information')->schema([
                    TextInput::make('name')->label("College Name")->required()->maxLength(255),
                    TextInput::make('email')->label("College Mail ID")->email()->required()->maxLength(255)->unique(ignoreRecord: true),
                    TextInput::make('phone')->label("College Phone Number")->prefix("+ 91")->tel()->required()->maxLength(255),
                    TextInput::make('college_code')->label("College Code")->required()->live()->reactive()->maxLength(5)->rules(['regex:/^[0-9][A-Z]{2}$/']),
                    Textarea::make('address')->required(),
                    TextInput::make('website')->maxLength(255)->prefix("https://"),
                    FileUpload::make('logo')->image()->directory('college'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('phone')->searchable(),
                ImageColumn::make('logo'),
                TextColumn::make('website')->searchable(),
                TextColumn::make('college_code')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
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
            'index' => Pages\ListColleges::route('/'),
            'create' => Pages\CreateCollege::route('/create'),
            'view' => Pages\ViewCollege::route('/{record}'),
            'edit' => Pages\EditCollege::route('/{record}/edit'),
        ];
    }
}
