<?php

namespace App\Filament\Resources\DepartmentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Group;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'students';
    protected static ?string $navigationLabel = 'Student';
    protected static ?string $slug = 'college-students';
    protected static ?string $modelLabel = 'Student';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Student Name')->schema([
                        Select::make('user_id')->relationship('user', 'name', fn($query) => $query->where('role', 'student'))
                            ->searchable()->preload()->required(),
                    ])
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('College Details')->schema([
                        Select::make('college_id')->relationship('college', 'name')->preload()->searchable()->required(),
                    ]),
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('Department Details')->schema([
                        Select::make('department_id')->relationship('department', 'name')->preload()->searchable()->required(),
                    ]),
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('Student Details')->schema([
                        TextInput::make('usn')->required()
                            ->rules(['regex:/^[0-9]{1}[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{3}$/'])
                            ->validationAttribute('USN')->unique(ignoreRecord: true)
                            ->helperText('Ex: 4JK21CS016 or 4jk21cs016'),
                        Select::make('semester')->required()->options([
                            '1' => '1 st',
                            '2' => '2 nd',
                            '3' => '3 rd',
                            '4' => '4 th',
                        ]),
                    ])->columns(2),
                ])->columnSpan(1),
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user_id')
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable(),
                TextColumn::make('college.name')->numeric()->sortable(),
                TextColumn::make('department.name')->numeric()->sortable(),
                TextColumn::make('usn')->searchable(),
                TextColumn::make('semester')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('semester')->options([
                    '1' => '1 st',
                    '2' => '2 nd',
                    '3' => '3 rd',
                    '4' => '4 th',
                ]),
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
