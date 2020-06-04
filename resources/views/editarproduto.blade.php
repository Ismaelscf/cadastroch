@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{ url('/produtos/'.$prod->id) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomeProduto">Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" value="{{$prod->nome}}" id="nomeProduto">
                </div>
                <div class="form-group col-md-6">
                    <label for="precoProduto">Preço</label>
                    <input type="number" step="0.01" class="form-control" name="precoProduto" value="{{$prod->preco}}"id="precoProduto">
                </div>
            
                <div class="form-group col-md-12">
                    <label for="descProduto">Descrição</label>
                    <textarea class="form-control" name="descProduto" rows="4" value="{{$prod->descricao}}" id="descProduto">{{$prod->descricao}}</textarea>
                </div>
        

            </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="cancel" class="btn btn-danger">Cancelar</button>
        
        </form>
    </div>
</div>



@endsection