<?php

namespace App\Filament\Resources\ProgramResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class SpeakersRelationManager extends RelationManager
{
    protected static string $relationship = 'speakers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Speaker Details')->columns(2)->schema([
                    FileUpload::make('image')->label('Speaker Image')->required()->image()->acceptedFileTypes(['image/*'])
                    ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                    ->directory('events/speaker')->downloadable()->preserveFilenames()->openable(),
                    TextInput::make('name')->label('Speaker Name')->required()->maxLength(255),
                    TextInput::make('designation')->label('Speaker Designation')->required()->maxLength(255),
                    TextInput::make('email')->label('Speaker Email')->required()->email()->maxLength(255),
                    TextInput::make('phone')->label('Speaker Phone')->required()->maxLength(255),
                ])->collapsible()->columns(2),
                Select::make('program_id')->relationship('programs','name')->required(),
                Section::make("Speaker's Social Links")->columns(2)->schema([
                    TextInput::make("linkedin")->label('LinkedIn Url')->required()->maxLength(255),
                    TextInput::make("instagram")->label('Instagram Url')->required()->maxLength(255),
                    TextInput::make("twitter")->label('Twitter Url')->required()->maxLength(255),
                ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('program_id')
            ->columns([
                ImageColumn::make('image')->searchable()->sortable()->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('designation')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('phone')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
