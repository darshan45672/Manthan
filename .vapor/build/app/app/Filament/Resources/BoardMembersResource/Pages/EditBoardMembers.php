<?php

namespace App\Filament\Resources\BoardMembersResource\Pages;

use App\Filament\Resources\BoardMembersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBoardMembers extends EditRecord
{
    protected static string $resource = BoardMembersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
