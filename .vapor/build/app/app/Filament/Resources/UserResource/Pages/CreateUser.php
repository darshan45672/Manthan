<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Notifications\UserNotification;
use Filament\Actions;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = UserResource::class;


    public function getSteps(): array
    {
        return [
            Step::make('User Details')->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('phone')->required()->maxLength(255)->unique(ignoreRecord: true),
                TextInput::make('email')->email()->required()->maxLength(255)->unique(ignoreRecord: true),
            ]),
            Step::make('User Additional Information')->schema([
                FileUpload::make('image')->image()->directory('users')->nullable()->downloadable()->preserveFilenames()->openable(),
                Textarea::make('address')->nullable(),
            ]),
            Step::make('User role and credentials')->schema([
                Select::make('role')->options([
                    'student' => 'Student',
                    'faculty' => 'Faculty',
                    'HoD' => 'HoD',
                    'Principle' => 'Principle',
                ])->required()->default('student'),
                TextInput::make('password')->label('Password')
                        ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                        ->password()->placeholder('********')->dehydrated(fn($state) => filled($state)),
                    DateTimePicker::make('email_verified_at')->label('Email Verified At')->default(now()),
                    Checkbox::make('is_admin')->label('Is Admin')->default(false),
            ]),
        ];
    }

    protected function afterCreate(): void
    {
        // Send notification to the newly created user
        // dd("called");
        $this->record->notify(new UserNotification(0));
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User Created Successfully')
            ->body('The user has been created successfully.');
    }
}
