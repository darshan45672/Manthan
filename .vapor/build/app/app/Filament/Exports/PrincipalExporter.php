<?php

namespace App\Filament\Exports;

use App\Models\Principal;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PrincipalExporter extends Exporter
{
    protected static ?string $model = Principal::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')->label('Name'),
            ExportColumn::make('user.email')->label('Email'),
            ExportColumn::make('user.phone')->label('Phone'),
            ExportColumn::make('college.name')->label('College'),
            ExportColumn::make('qualification')->label('Qualification'),
            ExportColumn::make('experience')->label('Experience'),
            ExportColumn::make('specialization')->label('Specialization'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your principal export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
