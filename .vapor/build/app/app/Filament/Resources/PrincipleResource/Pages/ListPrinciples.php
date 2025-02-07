<?php

namespace App\Filament\Resources\PrincipleResource\Pages;

use App\Exports\PrinciplesExport;
use App\Filament\Resources\PrincipleResource;
use App\Models\Principal;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListPrinciples extends ListRecords
{
    protected static string $resource = PrincipleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
