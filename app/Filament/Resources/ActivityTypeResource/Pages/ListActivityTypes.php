<?php

namespace App\Filament\Resources\ActivityTypeResource\Pages;

use App\Exports\ActivityTypesExport;
use App\Filament\Resources\ActivityTypeResource;
use App\Models\ActivityType;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListActivityTypes extends ListRecords
{
    protected static string $resource = ActivityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
