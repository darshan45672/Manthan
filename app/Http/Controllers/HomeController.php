<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Post;
use App\Models\Program;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\CommonMarkConverter;

class HomeController extends Controller
{
    public function home()
    {
        // $converter = new CommonMarkConverter();
        $eventTypes = ['SDP', 'FDP', 'STTP', 'Workshop', 'Seminar', 'Conference', 'Webinar', 'Hackathon', 'Bootcamp', 'Other'];
        $events = Program::orderBy('created_at','desc')->with('speakers')->limit(4)->get();
        $posts = Post::orderBy('created_at','desc')->with('category')->limit(3)->get();
        $testimonials = Testimonials::where('is_published', true)->orderBy('created_at', 'desc')->with('user')->get();
        $colleges = College::limit(10)->get();

        // dd($colleges);
        return view('home.index', compact('eventTypes', 'events', 'posts', 'testimonials', 'colleges'));
    }

    public function about(){
        return view('about.index');
    }

    public function contact(){
        return view('contact.index');
    }
}
