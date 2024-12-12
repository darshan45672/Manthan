<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // dd($request->user());
        $request->session()->regenerate();

        if ($request->user()->is_admin == 1) {
            // dd('admin');
            return redirect()->to('/admin')->with('success','Welcome back, Admin!');
        }else{
            // dd($request->user()->role);
            switch ($request->user()->role) {
                case 'student':
                    // dd('student');
                    return redirect()->intended(route('user.dashboard', absolute: false))->with('success', 'Welcome back, ' . $request->user()->name . '!');
                case 'faculty':
                    dd('faculty');
                    // Add your code for faculty here
                    break;
                default:
                    // dd('others');
                    return redirect()->intended(route('home'))->with('success', 'Welcome back, ' . $request->user()->name . '!');
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'))->with('success','');
    }
}
