@extends('layout.layout')


@section('content')
<main>
    <div class="container d-flex justify-content-center mt-5">
        <form class="align-self-center" style="width: 50%;">
            <div class="form-group">
                <label for="exampleInputEmail1"class ="text-success"><strong>Email</strong></label>
                <input type="email" class="form-control border border-success" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputTitulo"class ="text-success"><strong>Titulo</strong></label>
                <input type="text" class="form-control border border-success">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputCargo" class="text-success"><strong>Cargo</strong></label>
                <input type="text" class="form-control border border-success">
            </div>
            <div class="form-group">
                <label for="exampleInputEstado" class="text-success"><strong>Estado</strong></label>
                <input type="text" class="form-control border border-success" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputCidade" class="text-success"><strong>Cidade</strong></label>
                <input type="text" class="form-control border border-success" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputSalario" class="text-success"><strong>Salário</strong></label>
                <input type="text" class="form-control border border-success" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputQtd" class="text-success"><strong>Quantidade de vagas</strong></label>
                <input type="text" class="form-control border border-success" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputDescricao" class="text-success"><strong>Descrição da vaga</strong></label>
                <textarea class="form-control border border-success" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="w-100 btn btn-success my-3">Públicar</button>
        </form>
    </div>
</main>
@endsection