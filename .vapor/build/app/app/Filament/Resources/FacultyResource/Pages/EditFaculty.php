<?php

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use App\Notifications\FacultyNotification;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFaculty extends EditRecord
{
    protected static string $resource = FacultyResource::class;

    protected function afterSave(): void
    {
        // Get the student record after update
        $faculty = $this->record;

        // Notify the user associated with the faculty
        $faculty->user->notify(new FacultyNotification($faculty, 'updated'));
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
