@extends('layout.layout')


@section('content')

    <main>
        <div class="container d-flex justify-content-center my-5">
            <div class="card border border-success" style="width: 60%;">
                <div class="card-header d-flex justify-content-center bg-success">
                    <h2 class="text-white">{{ $vaga->titulo }}</h2>
                </div>
                <div class="card-body ml-4 mt-3">
                    <h6 class="text-success mb-3"><strong>Cargo: </strong>{{ $vaga->cargo }}</h6>
                    <h6 class="text-success mb-3"><strong>Estado: </strong>{{ $vaga->estado }}</h6>
                    <h6 class="text-success mb-3"><strong>Cidade: </strong>{{ $vaga->cidade }}</h6>
                    <h6 class="text-success mb-3"><strong>Sálario: </strong>{{ $vaga->salario }}</h6>
                    <h6 class="text-success mb-3"><strong>Quantidade de vagas: </strong>{{ $vaga->quantidade }}</h6>
                    <h6 class="text-success mb-3"><strong>Descrição da vaga: </strong>{{ $vaga->descricao }}</h6>
                </div>
                <div class="card-footer bg-white border-success border-top">
                    <form action="">
                        <label for="formFileSm" class="form-label text-success">Carregue seu curriculo</label>
                        <input class="form-control form-control-sm border border-success text-success" id="formFileSm" type="file" />
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection