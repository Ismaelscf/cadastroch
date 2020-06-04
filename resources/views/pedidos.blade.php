@extends('layout.app', ["current" => "Pedidos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Gerar Pedido</h5>
        @if (count($prod) > 0)
        <table class="table table-hover table-sm table-order table-over">
            <thead>
                <th>Seleção</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </thead>
            <tbody>
            <form action="{{ url('/pedidos') }}" method="POST">
                @csrf
                @foreach ($prod as $prod)
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="ped" name="ped[]" value="{{$prod->id}}">
                        </div>
                    </td>

                    <td>{{$prod->nome}}</td>
                    <td>{{$prod->preco}}</td>
                    
                    <td>
                        <input type="number" class="form-control" id="quantidade" name="quant-{{$prod->id}}">
                    </td>
                </tr>
                @endforeach
                
                <div class="form-group col-md-6">
                    <label for="cliente">Nome do Cliente</label>
                    <input type="text" step="0.01" class="form-control" name="cliente" id="cliente">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="frete">Frete</label>
                      <input type="number" step="0.01" class="form-control" id="frete" name="frete">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="pagamento">Forma de Pagamento</label>
                      <select id="pagamento" name="pagamento" class="form-control">
                        <option selected>Selecione...</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Débito">Débito</option>
                        <option value="Crédito">Crédito</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="infPag">Inf. de Pagamento</label>
                      <input type="text" class="form-control" id="infPag" name="infPag">
                    </div>
                  </div>
            
                <div class="form-group col-md-12">
                    <label for="obs">Observações no Preparo</label>
                    <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
                </div>

                <div class="form-group col-md-12">
                    <label for="entrega">Entrega</label>
                    <textarea class="form-control" name="entrega" id="entrega" rows="3"></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Novo Pedido</button>


            </form>
            
            </tbody>   
        </table>
        @endif   
    </div>

    <div class="card-footer">
        
    </div>
</div>
@endsection