<?php

namespace App\Filament\Exports;

use App\Models\ProgramExpectedOutcomes;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ProgramExpectedOutcomesExporter extends Exporter
{
    protected static ?string $model = ProgramExpectedOutcomes::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')->label('Name'),
            ExportColumn::make('label')->label('PEO Label'),
            ExportColumn::make('description')->label('Description'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your program expected outcomes export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
