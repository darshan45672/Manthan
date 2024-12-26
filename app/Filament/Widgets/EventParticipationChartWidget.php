<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Program;
use App\Models\RegisteredEvent;

class EventParticipationChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Event Participants';

    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Fetch dynamic registration data grouped by program type
        $registrationCounts = Program::query()
            ->join('registered_events', 'programs.id', '=', 'registered_events.program_id')
            ->selectRaw('programs.type, COUNT(registered_events.id) as total_registrations')
            ->groupBy('programs.type')
            ->pluck('total_registrations', 'programs.type');

        return [
            'datasets' => [
                [
                    'label' => 'Participants of the Events',
                    'data' => $registrationCounts->values(), // Registration counts
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
            'labels' => $registrationCounts->keys(), // Event types as labels
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // Doughnut chart for visual representation
    }
}
