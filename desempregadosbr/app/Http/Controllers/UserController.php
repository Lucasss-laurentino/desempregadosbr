<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

class UserController extends Controller
{
    public function redirectToProvider($provider) {

        return Socialite::driver($provider)->redirect();

    }

    public function handleToCallback(Request $request, $provider) {

        $userProvider = Socialite::driver($provider)->user();

        // Lógica para cadastro e login
        if(User::where('provider_id', $userProvider->getId())->count() === 1) {
            
            $user = User::where('provider_id', $userProvider->getId())->first();

            $request->session()->put('user', $user);
            
            return to_route('vagas.index');
        
        } else {

            $user = User::create([
                'name' => $userProvider->getName(),
                'provider' => $provider,
                'provider_id' => $userProvider->getId(),
                'email' => $userProvider->getEmail(),
            ]);

            $request->session()->put('user', $user);

            return to_route('vagas.index');

        }
    }

    public function logout(Request $request) {

        $request->session()->flush('user');

        return to_route('vagas.index');
    }

    public function upload(Request $request) {

        $user = User::find($request->session()->get('user')['id']);

        $pathToFile = $request->file('my-file')->store('curriculos');
        
        $user->pathToFile = $request->file('my-file');

        return to_route('vagas.index');
    }
}
