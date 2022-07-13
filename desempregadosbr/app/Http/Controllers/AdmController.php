<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Vaga;


class AdmController extends Controller
{

    public function edit(Request $request, $id) {

        $vaga = Vaga::find($id);

        return view('vagas.edit')->with('vaga', $vaga);

    }

    public function update(Request $request, $id) {

        $vaga = Vaga::find($id);

        $vaga->fill($request->all());

        $vaga->save();

        return to_route('vagas.index');

    }
    
    public function destroy($id) {
    
        Vaga::where('id', $id)->delete();
        
        return to_route('vagas.index');
    }
}
