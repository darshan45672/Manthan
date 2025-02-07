<?php

namespace App\Filament\Resources\ProgramResource\Pages;

use App\Events\EventCreated;
use App\Filament\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

    protected function afterCreate(): void
    {
        event(new EventCreated($this->record));
    }
}
