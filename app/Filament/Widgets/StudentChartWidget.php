<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StudentChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Students';

    // protected int | string | array $columnSpan = 1;

     protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Students per Department',
                    'data' => [1000, 6000, 3000, 5000, 7000, 1000, 7000, 4000, 6000, 3000],
                    'backgroundColor' => [  'rgb(8, 28, 21)',
                                            'rgb(27, 67, 50)',
                                            'rgb(45, 106, 79)',
                                            'rgb(64, 145, 108)',
                                            'rgb(82, 183, 136)',
                                            'rgb(116, 198, 157)',
                                            'rgb(149, 213, 178)',
                                            'rgb(183, 228, 199)',
                                            'rgb(216, 243, 220)',
                                            'rgb(216, 243, 220)',],
                ],
            ],
            'labels' => ['CSE', 'ISE', 'ECE', 'AIDS', 'AIML', 'ICB', 'MECH', 'CIVIL'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}