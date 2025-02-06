<?php

namespace App\Filament\Exports;

use App\Models\Faculty;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class FacultyExporter extends Exporter
{
    protected static ?string $model = Faculty::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')->label('Faculty Name'),
            ExportColumn::make('college.name')->label('College Name'),
            ExportColumn::make('department.name')->label('Department Name'),
            ExportColumn::make('designation')->label('Designation'),
            ExportColumn::make('experience')->label('Experience'),
            ExportColumn::make('joining_date')->label('Joining Date'),
            ExportColumn::make('leaving_date')->label('Leaving Date'),
            ExportColumn::make('status')->label('Status')->formatStateUsing(function (Faculty $faculty) {
                return $faculty->status ? 'Active' : 'Inactive';
            }),
            ExportColumn::make('is_cordinator')->label('Is Coordinator')->formatStateUsing(function (Faculty $faculty) {
                return $faculty->is_cordinator ? 'Yes' : 'No';
            }),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your faculty export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
