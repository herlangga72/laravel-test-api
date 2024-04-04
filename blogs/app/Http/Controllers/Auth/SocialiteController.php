<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Route;


class SocialiteController extends Controller
{
    public function googleRedirect(Request $request)
    {
        return Socialite::driver('google')->redirect( config('services.google.redirect') );
    }

    public function googleOAuth(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => null,
            ]);
        }

        Auth::login($user);

        return redirect()->Route('blogsAdmin.list');
    }
}
