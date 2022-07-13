<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

use App\Models\Vaga;

use App\Mail\Candidato;

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

    public function show() {
        return view('vagas.show');
    }
    
    public function upload(Request $request, $id) {

        $vaga = Vaga::find($id);

        $pathToFile = $request->file('my-file')->store('curriculos');

        Mail::to($vaga->email)->send(new Candidato($vaga->id, $vaga->titulo, $pathToFile));

        return to_route('vagas.index');

    }

}
