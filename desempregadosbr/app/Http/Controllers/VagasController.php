<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vaga;

use App\Models\Candidatura;

class VagasController extends Controller
{
    public function index() {

        $vagas = Vaga::query()->orderBy('id', 'desc')->simplePaginate(10);
        
        $candidaturas = Candidatura::all();

        return view('vagas.index')->with('vagas', $vagas)->with('candidaturas', $candidaturas);

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

    public function show(Request $request, $id) {

        $vaga = Vaga::find($id);

        $candidaturas = Candidatura::where('vaga_id', $vaga->id)->get();

        foreach($candidaturas as $candidatura) {

            if($candidatura->user_id === session()->get('user')['id']) {
                
                $dados = $candidatura;
                
                return view('vagas.show')->with('vaga', $vaga)->with('candidatura', $dados);

            } else {

                $candidatura = null;
                return view('vagas.show')->with('vaga', $vaga)->with('candidatura', $candidatura);

            }
    
        }
        
    }
}
