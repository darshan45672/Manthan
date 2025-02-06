<?php

namespace App\Filament\Resources;

use App\Filament\Exports\BoardPresidentsExporter;
use App\Filament\Resources\BoardPresidentsResource\Pages;
use App\Filament\Resources\BoardPresidentsResource\RelationManagers;
use App\Models\BoardPresidents;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoardPresidentsResource extends Resource
{
    protected static ?string $model = BoardPresidents::class;
    protected static ?string $navigationGroup = 'Boards / Committees';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Board Presidents';
    protected static ?string $slug = 'aicte-board-presidents';
    protected static ?string $modelLabel = 'Board President';

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
        return $table->recordTitleAttribute('user_id')
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('user.role'),
                TextColumn::make('board.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()->exporter(BoardPresidentsExporter::class),
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
            'index' => Pages\ListBoardPresidents::route('/'),
            'create' => Pages\CreateBoardPresidents::route('/create'),
            'edit' => Pages\EditBoardPresidents::route('/{record}/edit'),
        ];
    }
}
