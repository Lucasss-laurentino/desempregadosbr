@extends('layout.layout')


@section('content')

<div class="container">
    <form  action="{{ route('adm.update', $vaga->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Email</strong></label>
        <input type="email" class="form-control border border-success text-success" value="{{ $vaga->email }}" id="email_editar" name="email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Titulo</strong></label>
        <input type="text" class="form-control border border-success text-success" value="{{ $vaga->titulo }}" id="titulo_editar" name="titulo">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Cargo</strong></label>
        <input type="text" class="form-control border border-success text-success" value="{{ $vaga->cargo }}" id="cargo_editar" name="cargo">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Cidade</strong></label>
        <input type="text" class="form-control border border-success text-success" value="{{ $vaga->cidade }}" id="cidade_editar" name="cidade">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Estado</strong></label>
        <input type="text" class="form-control border border-success text-success" value="{{ $vaga->estado }}" id="estado_editar" name="estado">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Sálario</strong></label>
        <input type="text" class="form-control border border-success text-success" value="{{ $vaga->salario }}" id="salario_editar" name="salario">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="text-success mt-3"><strong>Número de vagas</strong></label>
        <input type="number" min="1" class="form-control border border-success text-success" value="{{ $vaga->quantidade }}" id="numero_de_vagas_editar" name="quantidade">
    </div>
    <div class="form-group mt-3">
        <label for="exampleFormControlTextarea1" class="text-success"><strong>Descrição da vaga</strong></label>
        <textarea class="form-control border border-success" id="descricao_editar" name="descricao" rows="3">{{ $vaga->descricao }}</textarea>
    </div>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p id="erros_editar" class="text-danger text-center my-3">{{ $error }}</p>
    @endforeach
    @endif
    <div class="form-group mt-3">
        <button class="btn btn-success w-100 mb-4" id="salvar">Salvar</button>
    </div>
    </form>
</div>


@endsection