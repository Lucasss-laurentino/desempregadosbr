@extends('layout.layout')


@section('content')
<main>
    <div class="container d-flex justify-content-center mt-5">
        <form class="align-self-center" style="width: 50%;" action="{{ route('vagas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"class ="text-success"><strong>Email</strong></label>
                @if(session()->get('user') != null)
                <input type="text" readonly class="form-control-plaintext form-control text-success p-2 bg-white" name="email" id="staticEmail" value= "{{ session()->get('user')['email'] }}">
                @else
                <input type="text" class="form-control-plaintext form-control border border-success text-success px-2 bg-white" name="email" id="staticEmail">
                @endif
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputTitulo"class ="text-success"><strong>Titulo</strong></label>
                <input type="text" class="form-control border border-success text-success" name="titulo">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputCargo" class="text-success"><strong>Cargo</strong></label>
                <input type="text" class="form-control border border-success text-success" name="cargo">
            </div>
            <div class="form-group">
                <label for="exampleInputEstado" class="text-success"><strong>Estado</strong></label>
                <input type="text" class="form-control border border-success text-success" name="estado" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputCidade" class="text-success"><strong>Cidade</strong></label>
                <input type="text" class="form-control border border-success text-success" name="cidade" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputSalario" class="text-success"><strong>Salário</strong></label>
                <input type="text" class="form-control border border-success text-success" name="salario" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputQtd" class="text-success"><strong>Quantidade de vagas</strong></label>
                <input type="number" class="form-control border border-success text-success" name="quantidade" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputDescricao" class="text-success"><strong>Descrição da vaga</strong></label>
                <textarea class="form-control border border-success text-success" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="w-100 btn btn-success my-3">Públicar</button>
        </form>
    </div>
</main>
@endsection