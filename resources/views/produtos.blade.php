@extends('layout.app', ["current" => "produtos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Produtos</h5>
        @if (count($prod) > 0)
        <table class="table table-order table-over">
            <thead>
                <th>Código</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                @foreach ($prod as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nome}}</td>
                    <td>{{$prod->preco}}</td>
                    <td>{{$prod->descricao}}</td>
                    <td>{{$prod->categoria_id}}</td>
                    <td>
                        <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/produtos/apagar/{{$prod->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>    
                @endforeach
            </tbody>
        </table>
        @endif   
    </div>

    <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
    </div>
</div>
@endsection