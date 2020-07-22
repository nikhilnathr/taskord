<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);

            return redirect('/');
        } else {
            $user = User::create([
                'username' => $userSocial->getId(),
                'firstname' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'avatar' => $userSocial->getAvatar(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);

            return redirect()->route('home');
        }
    }
}
