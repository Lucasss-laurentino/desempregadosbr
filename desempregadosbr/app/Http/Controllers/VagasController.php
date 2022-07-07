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
}
