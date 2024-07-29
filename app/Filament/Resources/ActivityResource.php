<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Student Activity';
    protected static ?string $modelLabel = 'Student Activity';
    protected static ?string $slug = 'student-activities';
    protected static ?string $navigationGroup = 'AICTE Activity';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Student Name')->schema([
                        Select::make('student_id')->label('Student Name')
                            ->relationship('student', 'id', function ($query) {
                                return $query->select('students.id', 'users.name')
                                    ->join('users', 'students.user_id', '=', 'users.id');
                            })->searchable()
                            ->getSearchResultsUsing(function ($query, $search) {
                                return \App\Models\Student::query()
                                    ->select('students.id', 'users.name')
                                    ->join('users', 'students.user_id', '=', 'users.id')
                                    ->where('users.name', 'like', "%{$search}%")
                                    ->orWhere('students.id', 'like', "%{$search}%")
                                    ->get()
                                    ->mapWithKeys(fn($student) => [$student->id => $student->name]);
                            })
                            ->getOptionLabelUsing(function ($value) {
                                $student = \App\Models\Student::find($value);
                                return $student ? $student->user->name : null;
                            })->required(),
                    ])
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('Activty Type')->schema([
                        Select::make('activity_type_id')->relationship('activityType', 'title')->searchable()->preload()->required(),
                    ]),
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make('Activity Details')->schema([
                        TextInput::make('title')->required()->maxLength(255),
                        TextInput::make('hours')->required()->maxLength(255)->numeric()->rules(['numeric', 'min:80'])->placeholder('80')->helperText('Minimum 80 hours required'),
                        DateTimePicker::make('start_date')->required()->default(now()),
                        DateTimePicker::make('end_date')->required()->default(now()),
                        Textarea::make('description')->required()->maxLength(255)->columnSpanFull(),
                    ])->columns(2),
                    Section::make('Activity Documents')->schema([
                        Select::make('status')->options([
                            'pending' => 'Pending',
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ])->required()->default('pending'),
                        Select::make('program_expected_outcomes_id')->relationship('programExpectedOutcomes', 'label')->searchable()->required()->preload(),
                        FileUpload::make('file')->directory('activities/report')->preserveFilenames()->openable()->downloadable()->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])->required(),
                        FileUpload::make('certificate')
                            ->directory('activities/certificate')->preserveFilenames()
                            ->openable()->downloadable()->multiple()->nullable()
                            ->acceptedFileTypes(['application/pdf', 'image/webp', 'image/png', 'image/jpeg', 'image/heic'])
                            ->label('Upload Certificates'),
                    ])->columns(2),
                ])->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.user.name')->numeric()->sortable()->searchable()->label("Student Name"),
                TextColumn::make('activityType.title')->sortable(),
                TextColumn::make('title')->label('Activity Title')->searchable(),
                TextColumn::make('description')->searchable(),
                TextColumn::make('start_date')->dateTime()->toggleable(isToggledHiddenByDefault: true)->searchable(),
                TextColumn::make('end_date')->dateTime()->toggleable(isToggledHiddenByDefault: true)->searchable(),
                TextColumn::make('hours')->searchable(),
                ImageColumn::make('certificate')->stacked()->circular()->limit(3)->limitedRemainingText(size: 'sm')->extraImgAttributes(['loading' => 'lazy']),
                SelectColumn::make('status')->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ]),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])->label('Activity Status'),
                SelectFilter::make('activity_type_id')->relationship('activityType', 'title'),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
