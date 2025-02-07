<?php

namespace App\Filament\Resources\HoDResource\Pages;

use App\Filament\Resources\HoDResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHoD extends EditRecord
{
    protected static string $resource = HoDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
