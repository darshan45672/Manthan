<?php

namespace App\Filament\Resources\BoardPresidentsResource\Pages;

use App\Filament\Resources\BoardPresidentsResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBoardPresidents extends ListRecords
{
    protected static string $resource = BoardPresidentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
