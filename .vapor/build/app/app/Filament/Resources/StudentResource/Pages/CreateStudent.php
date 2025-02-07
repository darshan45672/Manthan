<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Notifications\StudentNotification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = StudentResource::class;

    public function getSteps(): array
    {
        return [
            Step::make('Student Name')->schema([
                Select::make('user_id')->relationship('user', 'name', fn($query) => $query->where('role', 'student'))
                    ->searchable()->preload()->required(),
            ]),
            Step::make('College Details')->schema([
                Select::make('college_id')->relationship('college', 'name')->preload()->searchable()->required(),
            ]),
            Step::make('Department Details')->schema([
                Select::make('department_id')->relationship('department', 'name')->preload()->searchable()->required(),
            ]),
            Step::make('Student Details')->schema([
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
            ]),
        ];
    }

    protected function afterCreate(): void
    {
        $student = $this->record;

        // Dump the student to inspect the user_id
        // dd($student->user_id, $student->user);

        // Notify the user if found
        if ($student->user) {
            $student->user->notify(new StudentNotification($student, 'created'));
        } else {
            dd('No associated user found for this student.');   
        }
    }
}
