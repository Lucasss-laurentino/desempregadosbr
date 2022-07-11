<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function redirectToProvider($provider) {

        return Socialite::driver($provider)->redirect();

    }

    public function handleToCallback($provider) {

        $userProvider = Socialite::driver($provider)->user();

        dd($userProvider);
    }
}
