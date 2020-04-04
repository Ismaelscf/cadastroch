@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Categorias</h5>
        @if (count($cat) > 0)
        <table class="table table-order table-over">
            <thead>
                <th>Código</th>
                <th>Nome da Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($cat as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nome}}</td>
                    <td>
                        <a href="{{ url('/categorias/editar/'.$cat->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="{{ url('/categorias/apagar/'.$cat->id) }}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>    
                @endforeach
            </tbody>
        </table>
        @endif   
    </div>

    <div class="card-footer">
        <a href="{{ url('/categorias/novo') }}" class="btn btn-sm btn-primary" role="button">Nova Categoria</a>
    </div>
</div>

@endsection