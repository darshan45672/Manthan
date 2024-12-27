<?php

namespace App\Filament\Resources;

use App\Exports\Registeration;
use App\Filament\Exports\RegisteredEventsExporter;
use App\Filament\Resources\RegisteredEventResource\Pages;
use App\Filament\Resources\RegisteredEventResource\RelationManagers;
use App\Models\RegisteredEvents;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredEventResource extends Resource
{
    protected static ?string $model = RegisteredEvents::class;
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationLabel = 'Registerations';
    protected static ?string $slug = 'registered-events';
    protected static ?string $modelLabel = 'Registerations';
    protected static ?string $navigationGroup = 'Affliated Institutions';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('User Details')->schema([
                Select::make('user_id')->label("User Email")->relationship('user','email')
                ->searchable()->preload()->required(),
                Select::make('user_id')->label("User Email")->relationship('user','email')
                ->searchable()->preload(),
            ])->collapsible()->columns(2),
            Section::make('Event / Program Details')->schema([
                Group::make()->schema([
                    Select::make('program_id')->label("Program / Event Name")->relationship('program','name')
                    ->searchable()->preload()->required(),
                    DatePicker::make('registration_date')->default(now())->required(),
                ])->columns(2),
                Group::make()->schema([
                    Toggle::make('is_paid')->label("Is Paid ?")->default(false),
                    Toggle::make('is_attended')->label("Has Attended")->default(false),
                ])->columns(2),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label("User")->searchable()->sortable(),
                TextColumn::make('user.email')->label("User Email")->searchable()->sortable(),
                TextColumn::make('user.phone')->label("User Phone")->searchable()->sortable(),
                TextColumn::make('program.name')->label("Program Name")->searchable()->sortable(),
                TextColumn::make('program.type')->label("Program Type")->searchable()->sortable(),
                TextColumn::make('registration_date')->label("Registered Date")->date()->sortable(),
                IconColumn::make('is_paid')->boolean()->label('Is Paid')->sortable(),
                IconColumn::make('is_attended')->boolean()->label('Is Attended')->sortable(),
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
            ->headerActions([
                ExportAction::make()->exporter(RegisteredEventsExporter::class),
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
            'index' => Pages\ListRegisteredEvents::route('/'),
            'create' => Pages\CreateRegisteredEvent::route('/create'),
            'edit' => Pages\EditRegisteredEvent::route('/{record}/edit'),
        ];
    }
}
