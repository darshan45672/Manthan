<?php

namespace App\Filament\Resources;

use App\Filament\Exports\BoardExporter;
use App\Filament\Resources\BoardResource\Pages;
use App\Filament\Resources\BoardResource\RelationManagers;
use App\Filament\Resources\BoardResource\RelationManagers\MembersRelationManager;
use App\Filament\Resources\BoardResource\RelationManagers\PresidentRelationManager;
use App\Models\Board;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoardResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationGroup = 'Boards / Committees';
    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static ?string $navigationLabel = 'Boards';
    protected static ?string $slug = 'aicte-boards';
    protected static ?string $modelLabel = 'Board';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Board Details")->schema([
                    TextInput::make('name')->label('Name')->required(),
                    ToggleButtons::make('is_active')->label('Board Active?')->boolean()->grouped(), // not working
                    RichEditor::make('description')->label('Description')->required()->columnSpanFull(),
                ])->columns(2),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('description')->searchable()->sortable()
                    ->formatStateUsing(fn (string $state): string => strip_tags($state)),
                IconColumn::make('is_active')->label('is Active')->boolean(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])->headerActions([
                ExportAction::make()->exporter(BoardExporter::class),
            ])
            ->actions([
                EditAction::make(),
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
           MembersRelationManager::class,
           PresidentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBoards::route('/'),
            'create' => Pages\CreateBoard::route('/create'),
            'edit' => Pages\EditBoard::route('/{record}/edit'),
        ];
    }
}
