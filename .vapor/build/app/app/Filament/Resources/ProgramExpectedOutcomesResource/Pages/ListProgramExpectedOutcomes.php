<?php

namespace App\Filament\Resources\ProgramExpectedOutcomesResource\Pages;

use App\Exports\ProgramExpectedOutcomesExport;
use App\Filament\Resources\ProgramExpectedOutcomesResource;
use App\Models\ProgramExpectedOutcomes;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListProgramExpectedOutcomes extends ListRecords
{
    protected static string $resource = ProgramExpectedOutcomesResource::class;

    protected function getHeaderActions(): array
    {
            return[
                CreateAction::make(),
            ];
        }
}
