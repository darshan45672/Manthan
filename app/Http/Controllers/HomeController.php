<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Post;
use App\Models\Program;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use League\CommonMark\CommonMarkConverter;

class HomeController extends Controller
{
    private $cacheDuration = 60;
    public function home()
    {

        $eventTypes = ['SDP', 'FDP', 'STTP', 'Workshop', 'Seminar', 'Conference', 'Webinar', 'Hackathon', 'Bootcamp', 'Other'];
    
        $events = Cache::remember('home_events', $this->cacheDuration, function () {
            return Program::latest()->with(['speakers:id,name'])->limit(4)->get();
        });
    
        $posts = Cache::remember('home_posts', $this->cacheDuration, function () {
            return Post::latest()->with(['category'])->limit(3)->get();
        });
    
        $testimonials = Cache::remember('home_testimonials', $this->cacheDuration, function () {
            return Testimonials::where('is_published', true)->latest()->with(['user:id,name'])->get();
        });

        $colleges = Cache::rememberForever('home_colleges', function () {
            return College::limit(10)->get();
        });

        return View::make('home.index', compact('eventTypes', 'events', 'posts', 'testimonials', 'colleges'))->render();
    }

    public function about(){

        $testimonials = Cache::remember('about_testimonials', $this->cacheDuration, function () {
            return Testimonials::where('is_published', true)->latest()->with(['user:id,name'])->get();
        });

        return view('about.index', compact('testimonials'));
    }

    public function contact()
    {
        return view('contact.index');
    }
}
