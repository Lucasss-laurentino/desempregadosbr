@extends('layout.layout')

@section('content')

    <!--- Formulario com input search --->
    <header>
        <div class="container d-flex justify-content-center">
            <form class="mt-4 w-50" action="">
                <div class="d-flex">
                    <button class="btn btn-sm bg-success text-white px-3 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                    <input class="form-control d-inline border border-left-0" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
        <div class="container text-center mt-3 mb-4">
            <p class="text-success">Explore ou publique vagas de trabalho com simplicidade e sem burocracia !</p>
        </div>
    </header>
    <!--- --->
    
    <!--- Lista de vagas --->
    <main>
        <div class="container d-flex justify-content-center">
        @if($vagas != null)
        <div class="col-10 col-lg-6 col-md-6">
        <ul class="list-group">
            @foreach($vagas as $vaga)            
            <li class="list-group my-4">
                <div class="card border-success">
                    <div class="card-header bg-success d-flex justify-content-center text-center">
                        <p class="text-white mb-0" style="width:50%;"><strong>{{ $vaga->titulo }}</strong></p>
                        <!--- Verificando se o id do usuario 1 (adm) pra exibir controles --->
                        @if(session()->get('user') != null && session()->get('user')['id'] === 1)
                        <div class="container d-flex justify-content-end">
                            <form action="{{ route('adm.edit', $vaga->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-sm text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('adm.destroy', $vaga->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>                            
                                </button>
                            </form>
                        </div>
                        @endif
                        <!------>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text text-success">{{ $vaga->descricao }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-around bg-ligth border-white">
                        <!---
                            Verificando se o id da vaga e do usuario
                            é igual ao id do usuario logado e da vaga que
                            o candidato se candidatou 
                        --->                    
                        @if(session()->get('user') != null && $candidaturas != null)    
                        @foreach($candidaturas as $candidatura)
                        @if($candidatura->vaga_id === $vaga->id && $candidatura->user_id === session()->get('user')['id'])
                        <p class="text-success m-0">Candidatou-se</p>
                        @endif
                        @endforeach
                        @endif
                        <!------>
                        @if(session()->get('user') != null)
                        <a href="{{ route('vagas.show', $vaga->id) }}" class="ver_vaga btn btn-sm btn-success">Ver vaga</a>
                        @endif
                        @if(session()->get('user') === null)
                        <button data-toggle="modal" id="login_ver_vagas" data-target="#exampleModalCenter" class="ver_vaga btn btn-sm btn-success">Ver vaga</button>
                        @endif
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="col-12 mt-2 mb-3 pb-3 pt-2">
            <div class="d-flex justify-content-center text-success">
                    {{ $vagas->links() }}
            </div>
        </div>

        </div>
        @endif

        </div>
    </main>

@endsection