@extends('layout.tt', ["current" => "pedido"])

<b>Pedido</b><br>
{{$pedido->id}}
<br><b>Cliente:</b><br>
{{$pedido->cliente}}
<br><b>Observações:</b><br>
{{$pedido->obs}}
<br><b>Entrega:</b><br>
{{$pedido->entrega}}
<br><b>Pedidos</b><br>
<ul>
    @foreach ($pedido->produtos as $prod) 
        <li>
            {{$prod->nome}}  | 
            Quantidade:  {{$prod->pivot->quantidade}}
        </li>
    @endforeach
</ul>
<b>Preço:</b><br>
{{$preco}}
<br><b>Forma de pagamento:</b><br>
{{$pedido->pagamento}}
<br><b>Informações do Pagamento:</b><br>
{{$pedido->infPag}}

<div class="card-footer">
    <button type="button" onclick="imprimir()" class="btn btn-success">Imprimir</button>
    <a href="{{ url('/pedidos') }}" class="btn btn-primary">Novo pedido</a>
</div>

<script>
    function imprimir(){ console.log('test'); window.print(); }
</script>