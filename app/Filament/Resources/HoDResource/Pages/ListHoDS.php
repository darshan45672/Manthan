<?php

namespace App\Filament\Resources\HoDResource\Pages;

use App\Exports\HODsExport;
use App\Filament\Resources\HoDResource;
use App\Models\HoD;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListHoDS extends ListRecords
{
    protected static string $resource = HoDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
