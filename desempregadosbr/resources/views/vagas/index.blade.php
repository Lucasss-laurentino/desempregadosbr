@extends('layout.layout')

@section('content')

    <!--- Formulario com input search --->
    <header>
        <div class="container d-flex justify-content-center">
            <form class="mt-4 w-50" action="">
                <div class="d-flex">
                    <button class="bg-success text-white px-3 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input class="form-control d-inline me-2 border border-left-0" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
        <div class="container d-flex justify-content-center mt-3 mb-4">
            <p class="text-success">Explore vagas de trabalhos com simplicidade e sem burocracia !</p>
        </div>
    </header>
    <!--- --->
    
    <!--- Lista de vagas --->
    <main>
        <div class="container" style="width: 40%;">
        @if($vagas != null)
        <ul class="list-group">
            @foreach($vagas as $vaga)
            <li class="list-group my-4">
                <div class="card border-success">
                    <div class="card-header bg-success d-flex justify-content-center">
                        <p class="text-white mb-0"><strong>{{ $vaga->titulo }}</strong></p>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-success">{{ $vaga->descricao }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-white border-white">
                        <a href="{{ route('vagas.show', $vaga->id) }}" class="ver_vaga btn btn-sm btn-success">Ver vaga</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
        </div>
    </main>
@endsection