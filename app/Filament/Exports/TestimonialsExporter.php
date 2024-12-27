<?php

namespace App\Filament\Exports;

use App\Models\Testimonials;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class TestimonialsExporter extends Exporter
{
    protected static ?string $model = Testimonials::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')->label('Name'),
            ExportColumn::make('user.email')->label('Email'),
            ExportColumn::make('title')->label('Title'),
            ExportColumn::make('testimonial')->label('Testimonial'),
            ExportColumn::make('is_published')->label('Published')->formatStateUsing(fn ($row) => $row->is_published ? 'Yes' : 'No'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your testimonials export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
