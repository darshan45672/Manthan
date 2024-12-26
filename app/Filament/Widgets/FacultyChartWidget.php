<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Faculty;

class FacultyChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Faculties';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
       
        $facultyCounts = Faculty::selectRaw('designation, COUNT(*) as count')
            ->groupBy('designation')
            ->pluck('count', 'designation');

        return [
            'datasets' => [
                [
                    'label' => 'Number of Faculties',
                    'data' => $facultyCounts->values(), 
                    'backgroundColor' => [
                        'rgb(27, 67, 50)',
                        'rgb(45, 106, 79)',
                        'rgb(64, 145, 108)',
                        'rgb(82, 183, 136)',
                        'rgb(116, 198, 157)',
                    ],
                ],
            ],
            'labels' => $facultyCounts->keys(), 
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
