<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Notifications\StudentNotification;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

    protected function afterSave(): void
    {
        // Get the student record after update
        $student = $this->record;

        // Notify the user associated with the student
        $student->user->notify(new StudentNotification($student, 'updated'));
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
