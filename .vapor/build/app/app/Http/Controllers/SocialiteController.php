<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
        // dd($providerUser);

        $user = User::where('email', $providerUser->getEmail())->first();

        // dd($user);

        if($user){
            $user->update([
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'image' => $providerUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('home');
        }else{
            $newUser = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider_id' => $providerUser->getId(),
                'provider' => $provider,
                'image' => $providerUser->getAvatar(),
                'password' => Hash::make($providerUser->getName() . time() . $providerUser->getId() ),
                'role' => 'student',
                'is_admin' => false,
            ]);

            if($newUser){
                Auth::login($newUser);
                return redirect()->route('home');
            }   
        }

    }
}
