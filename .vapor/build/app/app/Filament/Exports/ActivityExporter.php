<?php

namespace App\Filament\Exports;

use App\Models\Activity;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ActivityExporter extends Exporter
{
    protected static ?string $model = Activity::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('user.name')->label('Student Name'),
            ExportColumn::make('user.email')->label('Student Email'),
            ExportColumn::make('user.phone')->label('Student Phone'),
            ExportColumn::make('title')->label('Activity Title'),
            ExportColumn::make('activityType.title')->label('Activity Type'),
            ExportColumn::make('status')->label('Activity Status'),
            ExportColumn::make('started_at')->label('Started At'),
            ExportColumn::make('ended_at')->label('Ended At'),
            ExportColumn::make('hours')->label('Hours'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your activity export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
