@extends('layout.app', ["current" => "produtos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Pedido</h5>
        <form>
            <div class="form-group">
              <label for="cliente">Nome do Cliente</label>
              <input type="text" class="form-control" id="cliente" aria-describedby="emailHelp" value="{{$pedido->cliente}}" readonly>
            </div>

            <div class="form-group">
              <label for="obs">Observações de Preparo</label>
              <input type="text" class="form-control" id="obs" value="{{$pedido->obs}}" readonly>
            </div>
            <div class="form-group">
                <label for="entrega">Entrega</label>
                <input type="text" class="form-control" id="entrega" value="{{$pedido->entrega}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Produtos</label>
           
                @if (count($pedido->produtos)> 0) 
                    <ul>
                        @foreach ($pedido->produtos as $prod) 
                            <li>
                                {{$prod->nome}}  | 
                                Quantidade:  {{$prod->pivot->quantidade}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" id="preco" value="{{$preco}}" readonly>
            </div>
        </form>
    </div>

    <div class="card-footer">
        <button type="button" onclick="imprimir()" class="btn btn-success">Imprimir</button>
    </div>
</div>
@endsection

<script>
    function imprimir(){ console.log('test'); window.print(); }
</script>