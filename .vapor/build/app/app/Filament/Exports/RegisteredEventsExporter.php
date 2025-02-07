<?php

namespace App\Filament\Exports;

use App\Models\RegisteredEvents;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class RegisteredEventsExporter extends Exporter
{
    protected static ?string $model = RegisteredEvents::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')->label('Name'),
            ExportColumn::make('user.email')->label('Email'),
            ExportColumn::make('program.name')->label('Program / Event Name'),
            ExportColumn::make('program.type')->label('Program Type'),
            ExportColumn::make('is_paid')->label('Is Paid ?')->formatStateUsing(fn ($row) => $row->is_paid ? 'Yes' : 'No'),
            ExportColumn::make('is_attended')->label('Has Attended')->formatStateUsing(fn ($row) => $row->is_attended ? 'Yes' : 'No'),
            ExportColumn::make('registration_date')->label('Registration Date'),
            ExportColumn::make('program.start_date')->label('Program Start Date'),
            ExportColumn::make('program.end_date')->label('Program End Date'),

        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your registered events export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
