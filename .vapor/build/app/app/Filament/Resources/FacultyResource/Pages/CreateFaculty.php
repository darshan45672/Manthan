<?php

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use App\Notifications\FacultyNotification;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaculty extends CreateRecord
{
    protected static string $resource = FacultyResource::class;

    protected function afterCreate(): void
    {
        $faculty = $this->record;

        // Dump the faculty to inspect the user_id
        // dd($faculty->user_id, $faculty->user);

        // Notify the user if found
        if ($faculty->user) {
            $faculty->user->notify(new FacultyNotification($faculty, 'created'));
        } else {
            dd('No associated user found for this student.');
        }
    }
}
