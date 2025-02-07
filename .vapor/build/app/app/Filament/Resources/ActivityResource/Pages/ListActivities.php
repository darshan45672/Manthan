<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Exports\ActivitiesExport;
use App\Filament\Resources\ActivityResource;
use App\Models\Activity;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
