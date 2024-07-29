<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrincipleResource\Pages;
use App\Filament\Resources\PrincipleResource\RelationManagers;
use App\Models\Principle;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrincipleResource extends Resource
{
    protected static ?string $model = Principle::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';
    protected static ?string $navigationLabel = 'Principal';
    protected static ?string $slug = 'college-principals';
    protected static ?string $modelLabel = 'Principal';
    protected static ?string $navigationGroup = 'Employees and Students';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Principle Name')->schema([
                        Select::make('user_id')->relationship('user', 'name', fn($query) => $query->where('role', 'Principle'))
                            ->searchable()->preload()->required(),
                    ])
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('College Details')->schema([
                        Select::make('college_id')->relationship('college', 'name')->preload()->searchable()->required(),
                    ]),
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('College Details')->schema([
                        Select::make('qualification')->options([
                            'B.Tech' => 'B.Tech',
                            'M.Tech' => 'M.Tech',
                            'PhD' => 'PhD',
                            'M.Sc' => 'M.Sc',
                            'B.Sc' => 'B.Sc',
                        ])->required()->multiple(),
                        Select::make('specialization')->options([
                            'B.Tech' => 'B.Tech',
                            'M.Tech' => 'M.Tech',
                            'PhD' => 'PhD',
                            'M.Sc' => 'M.Sc',
                            'B.Sc' => 'B.Sc',
                        ])->required()->multiple(),
                        TextInput::make('experience')->required()->maxLength(255),
                        DatePicker::make('joining_date')->required(),
                    ])->columns(2),
                ])->columnSpan(2),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->numeric()->sortable(),
                TextColumn::make('college.name')->numeric()->sortable(),
                TextColumn::make('qualification')->searchable(),
                TextColumn::make('experience')->searchable(),
                TextColumn::make('specialization')->searchable(),
                TextColumn::make('joining_date')->searchable(),
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
            'index' => Pages\ListPrinciples::route('/'),
            'create' => Pages\CreatePrinciple::route('/create'),
            'edit' => Pages\EditPrinciple::route('/{record}/edit'),
        ];
    }
}
