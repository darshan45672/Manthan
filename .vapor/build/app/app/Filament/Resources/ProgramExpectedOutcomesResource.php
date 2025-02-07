<?php

namespace App\Filament\Resources;

use App\Exports\ProgramExpectedOutcomesExport;
use App\Filament\Exports\ProgramExpectedOutcomesExporter;
use App\Filament\Resources\ProgramExpectedOutcomesResource\Pages;
use App\Filament\Resources\ProgramExpectedOutcomesResource\RelationManagers;
use App\Filament\Resources\ProgramExpectedOutcomesResource\RelationManagers\ActivitiesRelationManager;
use App\Models\ProgramExpectedOutcomes;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class ProgramExpectedOutcomesResource extends Resource
{
    protected static ?string $model = ProgramExpectedOutcomes::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Program Expected Outcomes';
    protected static ?string $slug = 'program-expected-outcomes';
    protected static ?string $modelLabel = 'Program Expected Outcome';
    protected static ?string $navigationGroup = 'Affliated Institutions';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Program Expected Outcomes')->schema([
                        TextInput::make('label')->required()->maxLength(255),
                        TextInput::make('name')->required()->maxLength(255),
                        Textarea::make('description')->required()->maxLength(255)->columnSpanFull(),
                    ])->columns(2),
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('description')->searchable(),
            ])
            ->filters([
                //
            ])->headerActions([
                ExportAction::make()->exporter(ProgramExpectedOutcomesExporter::class),
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
            ActivitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgramExpectedOutcomes::route('/'),
            'create' => Pages\CreateProgramExpectedOutcomes::route('/create'),
            'edit' => Pages\EditProgramExpectedOutcomes::route('/{record}/edit'),
        ];
    }
}
