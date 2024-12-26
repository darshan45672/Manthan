<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Program;

class EventChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Events';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
       
        $eventCounts = Program::selectRaw('type, COUNT(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type');

        return [
            'datasets' => [
                [
                    'label' => 'Number of Events Conducted',
                    'data' => $eventCounts->values(), 
                    'backgroundColor' => [
                        'rgb(8, 28, 21)',
                        'rgb(27, 67, 50)',
                        'rgb(45, 106, 79)',
                        'rgb(64, 145, 108)',
                        'rgb(82, 183, 136)',
                        'rgb(116, 198, 157)',
                        'rgb(149, 213, 178)',
                        'rgb(183, 228, 199)',
                        'rgb(216, 243, 220)',
                        'rgb(216, 243, 220)',
                    ],
                ],
            ],
            'labels' => $eventCounts->keys(), 
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
