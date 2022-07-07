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
            <div class="card-footer border-success bg-white">
                <form action="">
                    <label for="formFileSm" class="form-label text-success"><strong>Selecione seu curriculo</strong></label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file"/>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection