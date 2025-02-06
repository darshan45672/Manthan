<?php

namespace App\Filament\Resources\BoardPresidentsResource\Pages;

use App\Filament\Resources\BoardPresidentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoardPresidents extends EditRecord
{
    protected static string $resource = BoardPresidentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
