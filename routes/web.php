<?php
use App\Produto;
use App\Pedido;
use App\Categoria;
use App\PedidoProduto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');//index
});

Route::get('/produtos', 'ControladorProduto@index');
Route::get('/categorias', 'ControladorCategoria@index');
Route::get('/categorias/novo', 'ControladorCategoria@create');
Route::post('/categorias', 'ControladorCategoria@store');
Route::get('/categorias/apagar/{id}', 'ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}', 'ControladorCategoria@edit');
Route::post('/categorias/{id}', 'ControladorCategoria@update');
Route::get('/produtos/novo', 'ControladorProduto@create');
Route::post('/produtos', 'ControladorProduto@store');
Route::get('/produtos/apagar/{id}', 'ControladorProduto@destroy');
Route::get('/produtos/editar/{id}', 'ControladorProduto@edit');
Route::post('/produtos/{id}', 'ControladorProduto@update');


Route::get('/pedidos', 'ControladorPedido@index');
Route::post('/pedidos', 'ControladorPedido@store');

Route::get('/pedidoFinalizado',function (){
    return view('pedidoFinalizado');
});


Route::get('/pedidos/imprimir/{id}', 'ControladorPedido@gerapdf');


Route::get('/teste', function () {
    
    $pedidos = Pedido::with('produtos')->get();
    

    foreach ($pedidos as $p) {
        echo "<p>Nome do Cliente: ".$p->cliente. "</p>";
        echo "<p>Observações no Preparo: ".$p->obs. "</p>";
        echo "<p>Entrega: ".$p->entrega. "</p>";
        $preco = $p->frete;

        if (count($p->produtos)> 0) {
            echo "Pedidos: </br>";
            echo "<ul>";
                foreach ($p->produtos as $prod) {
                    echo "<li>";
                        echo $prod->nome . " | ";
                        echo " Quantidade: " . $prod->pivot->quantidade;
                        $preco = $preco + ($prod->preco * $prod->pivot->quantidade);
                    echo "</li>";
                }
                echo "</ul>";
            echo "Preço: " . $preco;
            $preco = 0;
            echo "<hr/>";
        }
    }
}); 