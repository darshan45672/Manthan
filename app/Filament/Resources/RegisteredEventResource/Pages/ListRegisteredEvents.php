<?php

namespace App\Filament\Resources\RegisteredEventResource\Pages;

use App\Exports\Registeration;
use App\Filament\Resources\RegisteredEventResource;
use App\Models\RegisteredEvents;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListRegisteredEvents extends ListRecords
{
    protected static string $resource = RegisteredEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
