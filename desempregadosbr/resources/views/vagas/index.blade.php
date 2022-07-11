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
        @endif
        </div>
    </main>

            <!-- Modal login -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-header d-flex justify-content-end">
                            <a href="" class="btn btn-sm bg-white text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-success"><strong>Faça login ou registre-se em segundos</strong></h4>
                            <p class="text-success">Use seu email ou outra conta para entrar.</p>
                            <div class=" my-2">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn-redes btn btn-sm btn-success d-flex my-2 justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google align-self-center" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                        </svg>
                                        <p class="align-self-center mx-3 mb-0">Continuar com o Google</p>
                                    </a>
                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn-redes btn btn-success btn-sm my-2 d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                        </svg>  
                                        <p class="align-self-center mx-3 mb-0">Continuar com o facebook</p>
                                    </a>
                            </div>
                            <div class="container mt-5">
                                <p class="text-success">Ao continuar você concorda com nossos Termos de uso. Leia nossa Política de privacidade</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection