<?php

namespace App\Filament\Resources\ProgramExpectedOutcomesResource\Pages;

use App\Filament\Resources\ProgramExpectedOutcomesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramExpectedOutcomes extends EditRecord
{
    protected static string $resource = ProgramExpectedOutcomesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
