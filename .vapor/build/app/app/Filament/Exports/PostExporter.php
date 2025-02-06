<?php

namespace App\Filament\Exports;

use App\Models\Post;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PostExporter extends Exporter
{
    protected static ?string $model = Post::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id'),
            ExportColumn::make('title')->label('Post Title'),
            ExportColumn::make('slug')->label('Post Slug'),
            ExportColumn::make('user.name')->label('Author'),
            ExportColumn::make('content')->label('Post Content'),
            ExportColumn::make('tags')->label('Tags'),
            ExportColumn::make('category.name')->label('Category'),
            ExportColumn::make('published')->label('Published')->formatStateUsing(function (Post $post) {
                return $post->published ? 'Yes' : 'No';
            }),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your post export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
