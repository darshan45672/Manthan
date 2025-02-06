<?php

namespace App\Http\Controllers;

use App\Models\RegisteredEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardChartController extends Controller
{
    public function getEventCompletions()
    {
        $eventCompletions = RegisteredEvents::select('programs.type', DB::raw('count(*) as count'))
            ->join('programs', 'registered_events.program_id', '=', 'programs.id')
            ->where('registered_events.is_attended', true)
            ->groupBy('programs.type')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->type => $item->count];
            });

        // dd($eventCompletions);
        // Ensure all event types are represented, even if count is 0
        $allEventTypes = [
            'FDP' => 0,
            'SDP' => 0,
            'STTP' => 0,
            'Workshop' => 0,
            'Seminar' => 0,
            'Conference' => 0,
            'Webinar' => 0,
            'Hackathon' => 0,
            'Bootcamp' => 0,
            'Other' => 0
        ];

        // Merge actual counts with default types
        $finalCounts = array_merge($allEventTypes, $eventCompletions->toArray());

        // Format data for ECharts
        $chartData = collect($finalCounts)->map(function ($value, $type) {
            return [
                'value' => $value,
                'name' => $type
            ];
        })->values();

        return response()->json($chartData);
    }
}
