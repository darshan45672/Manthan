<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class MonthlyEventRegistrationChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Monthly Event Registrations';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $monthlyRegistrations = DB::table('registered_events')
            ->selectRaw("strftime('%m', created_at) as month, COUNT(id) as total_registrations")
            ->groupBy(DB::raw("strftime('%m', created_at)"))
            ->orderBy(DB::raw("strftime('%m', created_at)"))
            ->pluck('total_registrations', 'month');

        $data = collect(range(1, 12))->map(fn ($month) => $monthlyRegistrations->get(str_pad($month, 2, '0', STR_PAD_LEFT), 0));

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Event Registrations',
                    'data' => $data, 
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
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}