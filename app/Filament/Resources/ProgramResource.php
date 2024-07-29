<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationLabel = 'Program and activities';
    protected static ?string $slug = 'programs';
    protected static ?string $modelLabel = 'Program';

    // protected static ?string $navigationGroup = 'Programs and activities';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Program detials')->schema([
                        TextInput::make('name')->label('Program Name')->required()->maxLength(255),
                        Select::make('type')->label('Program Type')->options([
                            'SDP' => 'SDP',
                            'FDP' => 'FDP',
                            'STTP' => 'STTP',
                            'Workshop' => 'Workshop',
                            'Seminar' => 'Seminar',
                            'Conference' => 'Conference',
                            'Webinar' => 'Webinar',
                            'Hackathon' => 'Hackathon',
                            'Bootcamp' => 'Bootcamp',
                            'Other' => 'Other',
                        ])->required(),
                        TextInput::make('duration')->label('Program Duration')->suffix("Hours")->numeric()->required()->maxLength(255),
                        Textarea::make('description')->required()->columnSpanFull(),
                    ])->columns(3),
                    Section::make()->schema([
                        Section::make('Program Timings')->schema([
                            DatePicker::make('start_date')->required(),
                            DatePicker::make('end_date')->required(),
                        ])->columns(2),
                        Section::make('Program venue and organiser')->schema([
                            TextInput::make('organiser')->prefix('Mr/Mrs')->required()->maxLength(255),
                            TextInput::make('fees')->prefix('₹')->numeric()->maxLength(255)->default(null),
                            TextInput::make('location')->required()->maxLength(255),
                        ])->columns(2),
                    ]),
                ])->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('type')->searchable(),
                TextColumn::make('start_date')->searchable(),
                TextColumn::make('end_date')->searchable(),
                TextColumn::make('duration')->searchable(),
                TextColumn::make('fees')->searchable(),
                TextColumn::make('location')->searchable(),
                TextColumn::make('organiser')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
