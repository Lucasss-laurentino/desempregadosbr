@extends('layout.layout')

@section('content')

<main>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card border border-success bg-white" style="width: 60%;">
            <div class="card-header border-success bg-success d-flex justify-content-center">
                <h1 class="text-white">{{ $vaga->titulo }}</h1>
            </div>
            <div class="card-body ml-4">
                <p class="text-success"><strong>Cargo:</strong> {{ $vaga->cargo }}</p>
                <p class="text-success"><strong>Estado:</strong> {{ $vaga->estado }}</p>
                <p class="text-success"><strong>Cidade:</strong> {{ $vaga->cidade }}</p>
                <p class="text-success"><strong>Sálario:</strong> {{ $vaga->salario }}</p>
                <p class="text-success"><strong>Quantidade de vagas:</strong> {{ $vaga->quantidade }}</p>
                <p class="text-success"><strong>Descrição da vaga:</strong> {{ $vaga->descricao }}</p>
            </div>
            @if(session()->get('user') != null)
                @isset($candidatura)
                @if($candidatura->vaga_id === $vaga->id && $candidatura->user_id === session()->get('user')['id'])
                    <h3 class="text-success text-center my-2">Candidatou-se</h3>
                @endif
                @endisset
                @if($candidatura === null)
                    <div class="card-footer border-success bg-white">
                        <form action="{{ route('user.upload', $vaga->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="formFileSm" class="form-label text-success"><strong>Selecione seu curriculo</strong></label>
                            <input type="file" name="my-file" id="image" class="form-control" accept="application/pdf,application/vnd.ms-excel" />
                            <button type="submit" class="btn btn-sm bg-success text-white my-3 w-100">Enviar</button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
</main>

@endsection