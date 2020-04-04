@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="\produtos" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomeProduto">Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto">
                </div>
                <div class="form-group col-md-6">
                    <label for="precoProduto">Preço</label>
                    <input type="number" step="0.01" class="form-control" name="precoProduto" id="precoProduto">
                </div>
            
                <div class="form-group col-md-12">
                    <label for="descProduto">Descrição</label>
                    <textarea class="form-control" name="descProduto" id="descProduto" rows="4"></textarea>
                </div>
        
                <div class="form-group col-md-6">
                    <label for="catProduto">Categorias</label>
                    <select name="catProduto" id="catProduto" class="form-control">
                        @foreach ($cat as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="cancel" class="btn btn-danger">Cancelar</button>
        
        </form>
    </div>

    @if ($errors->any())
        <div class="card-footer">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        </div>    
    @endif

</div>
@endsection