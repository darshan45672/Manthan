<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class UserChartWidget extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'User';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Fetch the selected college name from the filter
        $collegeName = $this->filters['college'] ?? null;

        // Filter user counts by role and college name
        $userCounts = [
            'Principals' => User::where('role', 'Principle')
                ->when($collegeName, function ($query) use ($collegeName) {
                    $query->where('college', $collegeName);
                })
                ->count(),
            'Department Heads' => User::where('role', 'HoD')
                ->when($collegeName, function ($query) use ($collegeName) {
                    $query->where('college', $collegeName);
                })
                ->count(),
            'Faculties' => User::where('role', 'faculty')
                ->when($collegeName, function ($query) use ($collegeName) {
                    $query->where('college', $collegeName);
                })
                ->count(),
            'Students' => User::where('role', 'student')
                ->when($collegeName, function ($query) use ($collegeName) {
                    $query->where('college', $collegeName);
                })
                ->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'User Type',
                    'data' => array_values($userCounts),
                    'backgroundColor' => [
                        'rgb(27, 67, 50)',
                        'rgb(45, 106, 79)',
                        'rgb(64, 145, 108)',
                        'rgb(82, 183, 136)',
                    ],
                ],
            ],
            'labels' => array_keys($userCounts),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
