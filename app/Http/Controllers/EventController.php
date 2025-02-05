<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\RegisteredEvents;
use App\Models\Speakers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    private $cacheDuration = 60;
    public function events()
    {

        request()->validate([
            'search' => 'nullable|string|max:255',
        ]);

        if (request()->filled('search')) {
            $search = request()->get('search');

            $programs = Cache::remember("events_search_{$search}", $this->cacheDuration, function () use ($search) {
                return Program::where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%")
                    ->get();
            });
        } else {
            $programs = Cache::remember('events_list', $this->cacheDuration, function () {
                return Program::orderBy('start_date', 'asc')->get();
            });
        }

        return view('events.index', compact('programs'));
    }
    public function eventType($type)
    {
        $programs = Cache::remember("event_type_{$type}", $this->cacheDuration, function () use ($type) {
            return Program::where('type', $type)->get();
        });
    
        return view('events.index', compact('programs'));
    }

    public function featuredEvent()
    {
        $programs = Cache::remember('featured_events', $this->cacheDuration, function () {
            return Program::where('is_featured', 1)->get();
        });
        return view('events.index', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::find($id);
        if (!$program) {
            abort(404);
        }

        $speakers = Speakers::where('program_id', $id)->get();

        if (Auth::check()) {
            $userId = Auth::id();
            $registeredPrograms = RegisteredEvents::with('program')->where('user_id', $userId)->where('program_id', $id)->get();   
            if (count($registeredPrograms)) {
                return view('events.show', compact('program', 'speakers', 'registeredPrograms'));
            }
            $registeredPrograms = 0;
            return view('events.show', compact('program', 'speakers', 'registeredPrograms'));
        } else {
            return view('events.show', compact('program', 'speakers'));
        }
    }

    public function register($id)
    {
        $program = Program::find($id);
        if (!$program) {
            abort(404);
        }

        if (Auth::check()) {
            $alreadyRegistered = RegisteredEvents::where('program_id', $id)->where('user_id', Auth::user()->id)->first();

            if ($alreadyRegistered) {
                return redirect()->route('events.show', $id)->with('error', 'You have already registered for this event.');
            }

            RegisteredEvents::create([
                'program_id' => $id,
                'user_id' => Auth::user()->id,
                'is_paid' => 0,
                'registration_date' => now(),
                'is_attended' => 0,
            ]);

            return redirect()->route('events.show', $id)->with('success', 'You have successfully registered for the event.');
        }
    }

    public function viewEvents()
    {
        $events = match (Auth::user()->role) {
            'student' => Program::where('event_date', '>=', now())->where('type', '!=', 'FDP')->get(),
            'faculty', 'HoD', 'Principle' => Program::where('event_date', '>=', now())->where('type', '!=', 'SDP')->get(),
            default => Program::where('event_date', '>=', now())->get(),
        };

        // dd($events);
        return view('dashboard.events.index', compact('events'));
    }

    public function myEvents()
    {
        $user = Auth::user();

        $events = match ($user->role) {
            'student' => $user->registeredPrograms()->where('event_date', '>=', now())->where('type', '!=', 'FDP')->get(),
            'faculty', 'HoD', 'Principle' => $user->registeredPrograms()->where('event_date', '>=', now())->where('type', '!=', 'SDP')->get(),
            default => Program::where('event_date', '>=', now())->get(),
        };
        return view('dashboard.events.events', compact('events'));
    }
}
