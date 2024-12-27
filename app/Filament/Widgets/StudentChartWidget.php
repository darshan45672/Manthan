<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;
use App\Models\Department;

class StudentChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Students';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Fetch department names and student counts
        $studentCounts = Department::withCount('students')
            ->get()
            ->mapWithKeys(fn($department) => [$department->name => $department->students_count]);

        return [
            'datasets' => [
                [
                    'label' => 'Students per Department',
                    'data' => $studentCounts->values(), // Values of student counts
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
            'labels' => $studentCounts->keys(), 
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
