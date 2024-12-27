<?php

namespace App\Filament\Resources;

use App\Filament\Exports\BoardMembersExporter;
use App\Filament\Resources\BoardMembersResource\Pages;
use App\Filament\Resources\BoardMembersResource\RelationManagers;
use App\Models\BoardMembers;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoardMembersResource extends Resource
{
    protected static ?string $model = BoardMembers::class;

    protected static ?string $navigationGroup = 'Boards / Committees';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Board Members';
    protected static ?string $slug = 'aicte-board-members';
    protected static ?string $modelLabel = 'Board Member';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')
                            ->searchable()->preload()->required(),
                Select::make('board_id')->relationship('board', 'name')
                            ->searchable()->preload()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable(),
                TextColumn::make('user.email')->sortable()->searchable(),
                TextColumn::make('board.name')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])->headerActions([
                ExportAction::make()->exporter(BoardMembersExporter::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBoardMembers::route('/'),
            'create' => Pages\CreateBoardMembers::route('/create'),
            'edit' => Pages\EditBoardMembers::route('/{record}/edit'),
        ];
    }
}
