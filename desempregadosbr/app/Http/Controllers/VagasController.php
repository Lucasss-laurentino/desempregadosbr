<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vaga;

class VagasController extends Controller
{
    public function index() {

        $vagas = Vaga::query()->orderBy('created_at')->get();

        return view('vagas.index')->with('vagas', $vagas);

    }

    public function create() {
        return view('vagas.create');
    }

    public function store(Request $request) {
        
        Vaga::create($request->all());
        
        return to_route('vagas.index');
    }

    public function show($id) {
        $vaga = Vaga::find($id);

        return view('vagas.show')->with('vaga', $vaga);
    }
}
