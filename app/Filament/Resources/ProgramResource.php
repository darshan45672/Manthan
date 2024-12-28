<?php

namespace App\Filament\Resources;

use App\Exports\ProgramsExport;
use App\Filament\Exports\ProgramExporter;
use App\Filament\Imports\ProgramImporter;
use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Filament\Resources\ProgramResource\RelationManagers\ActivitiesRelationManager;
use App\Filament\Resources\ProgramResource\RelationManagers\ObjectivesRelationManager;
use App\Filament\Resources\ProgramResource\RelationManagers\SpeakersRelationManager;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
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
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationLabel = 'Program and activities';
    protected static ?string $slug = 'programs';
    protected static ?string $modelLabel = 'Program';

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
                            FileUpload::make('banner')->required()->label('Event Banner')->image()->acceptedFileTypes(['image/*'])
                        ->deleteUploadedFileUsing(fn($file) => Storage::disk('public')->delete($file))
                        ->directory('events/banner')->downloadable()->preserveFilenames()->openable(),
                        RichEditor::make('description')->required()->columnSpanFull(),
                    ])->columns(2),
                    Section::make()->schema([
                        Section::make('Program Timings')->schema([
                            DatePicker::make('start_date')->required(),
                            DatePicker::make('end_date')->required(),
                            TimePicker::make('start_time')->required()->default('09:00'),
                            TimePicker::make('end_time')->required()->default('17:00'),
                        ])->columns(2),
                        Section::make('Program venue and organiser')->schema([
                            TextInput::make('fees')->prefix('₹')->numeric()->maxLength(255)->default(null)->columns(2),
                            TextInput::make('location')->required()->maxLength(500),
                            TextInput::make('venue')->maxLength(255),
                            Grid::make('')->schema([
                                TextInput::make('address')->maxLength(255),
                                ToggleButtons::make('is_featured')->label('is Featured?')->boolean()->grouped()->default(false),
                                ToggleButtons::make('requires_registration')->label('Requires Registration?')->boolean()->grouped()->default(false),
                            ])->columns(3),
                        ])->columns(3),
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
            ->headerActions([
                ImportAction::make()->importer(ProgramImporter::class),
                ExportAction::make()->exporter(ProgramExporter::class),
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

    public static function getRelations(): array
    {
        return [
            SpeakersRelationManager::class,
            ObjectivesRelationManager::class,
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
