<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;
use App\Models\Testimonials;

class TestimonialChartWidget extends ChartWidget
{
    protected static ?string $heading = 'User Testimonials';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Fetch the count of testimonials grouped by user type
        $userTestimonialCounts = [
            'Principals' => Testimonials::whereHas('user', fn ($query) => $query->where('role', 'Principle'))->count(),
            'Department Heads' => Testimonials::whereHas('user', fn ($query) => $query->where('role', 'HoD'))->count(),
            'Faculties' => Testimonials::whereHas('user', fn ($query) => $query->where('role', 'faculty'))->count(),
            'Students' => Testimonials::whereHas('user', fn ($query) => $query->where('role', 'student'))->count(),
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Testimonials per User Type',
                    'data' => array_values($userTestimonialCounts), 
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
                        'rgb(183, 228, 199)',
                        'rgb(216, 243, 220)',
                    ],
                    'borderColor' => [
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
                        'rgb(183, 228, 199)',
                        'rgb(216, 243, 220)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_keys($userTestimonialCounts), 
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
