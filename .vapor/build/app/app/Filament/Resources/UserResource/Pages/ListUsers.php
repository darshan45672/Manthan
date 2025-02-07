<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Exports\UsersExport;
use App\Filament\Resources\UserResource;
use App\Filament\Widgets\UserChartWidget;
use App\Imports\UsersImport;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        /**
         * Get list of table headers and their configurations for displaying users.
         * This method defines the structure and behavior of the table columns in the users list view.
         *
         * @return array An array of table column configurations including sorting, filtering, and display options
         */
        return [
            UserChartWidget::make(),
        ];
    }
}
