@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{ url('/categorias') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nomeCategoria">Nova Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="cancel" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
</div>



@endsection