<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vaga;

class VagasController extends Controller
{
    public function index() {

        $vagas = Vaga::query()->orderBy('id', 'desc')->simplePaginate(10);

        return view('vagas.index')->with('vagas', $vagas);

    }

    public function create() {
        return view('vagas.create');
    }

    public function store(Request $request) {
        
        $user = session()->get('user');

        // Se o usuario não estiver logado pode criar vaga com qualquer email
        // Se o usuario estiver logado so pode criar uma vaga com seu próprio email
        if($user != null && $request->email === $user->email) {

            Vaga::create($request->all());
        
            return to_route('vagas.index');
    
        } elseif($user != null && $request->email != $user->email) {

            return to_route('vagas.create');
        
        } elseif($user === null) {

            Vaga::create($request->all());
        
            return to_route('vagas.index');
    
        }
    }

    public function show($id) {
        $vaga = Vaga::find($id);

        return view('vagas.show')->with('vaga', $vaga);
    }
}
