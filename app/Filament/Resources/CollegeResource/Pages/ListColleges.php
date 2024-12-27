<?php

namespace App\Filament\Resources\CollegeResource\Pages;

use App\Exports\CollegesExport;
use App\Filament\Resources\CollegeResource;
use App\Models\College;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListColleges extends ListRecords
{
    protected static string $resource = CollegeResource::class;

    protected function getHeaderActions(): array
    {
        return[
            CreateAction::make(),
        ];
    }
}
