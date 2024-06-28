<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('facebook_id', $facebookUser->id)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/home');
        } else {
            $newUser = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'password' => bcrypt('123456dummy') // you can generate a random password if you like
            ]);

            Auth::login($newUser);
            return redirect('/home');
        }
    }
}
