<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\RegisteredEvents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::id() === 1) {
            return redirect()->to('/admin');
        }
    
        $cacheDuration = 60;
    
        $participation = Cache::remember("user_participation_" . Auth::id(), $cacheDuration, function () {
            return RegisteredEvents::where('user_id', Auth::id())->count();
        });
    
        $acceptance = Cache::remember('activities_list', $cacheDuration, function () {
            return Activity::get();
        });
    
        return view("dashboard.index", compact('participation', 'acceptance'));
    }
}
