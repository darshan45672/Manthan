<?php

namespace App\Filament\Exports;

use App\Models\Program;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ProgramExporter extends Exporter
{
    protected static ?string $model = Program::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('name')->label('Program Name'),
            ExportColumn::make('description')->label('Description'),
            ExportColumn::make('type')->label('Type'),
            ExportColumn::make('duration')->label('Duration'),
            ExportColumn::make('description')->label('Description'),
            ExportColumn::make('start_date')->label('Start Date'),
            ExportColumn::make('end_date')->label('End Date'),
            ExportColumn::make('start_time')->label('Start Time'),
            ExportColumn::make('end_time')->label('End Time'),
            ExportColumn::make('location')->label('Location'),
            ExportColumn::make('address')->label('Address'),
            ExportColumn::make('is_featured')->label('Is Featured')->formatStateUsing(fn ($isFeatured) => $isFeatured ? 'Yes' : 'No'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your program export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
