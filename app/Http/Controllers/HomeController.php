<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Post;
use App\Models\Program;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use League\CommonMark\CommonMarkConverter;

class HomeController extends Controller
{
    public function home()
    {
        $eventTypes = ['SDP', 'FDP', 'STTP', 'Workshop', 'Seminar', 'Conference', 'Webinar', 'Hackathon', 'Bootcamp', 'Other'];
    
        $events = Cache::remember('home_events', 300, function () {
            return Program::orderBy('created_at', 'desc')->with('speakers')->limit(4)->get();
        });

        $posts = Cache::remember('home_posts', 300, function () {
            return Post::orderBy('created_at', 'desc')->with('category')->limit(3)->get();
        });

        $testimonials = Cache::remember('home_testimonials', 300, function () {
            return Testimonials::where('is_published', true)
                ->orderBy('created_at', 'desc')
                ->with('user')
                ->get();
        });

        $colleges = Cache::remember('home_colleges', 600, function () {
            return College::limit(10)->get();
        });

        return view('home.index', compact('eventTypes', 'events', 'posts', 'testimonials', 'colleges'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function contact()
    {
        return view('contact.index');
    }
}
