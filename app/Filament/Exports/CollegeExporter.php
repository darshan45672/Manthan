<?php

namespace App\Filament\Exports;

use App\Models\College;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CollegeExporter extends Exporter
{
    protected static ?string $model = College::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('name')->label('College Name'),
            ExportColumn::make('email')->label('College Mail ID'),
            ExportColumn::make('phone')->label('College Phone Number'),
            ExportColumn::make('college_code')->label('College Code'),
            ExportColumn::make('address')->label('College Address'),
            ExportColumn::make('website')->label('College Website'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string {
        $body = 'Your college export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
