<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Categoria;
use App\Pedido;
use App\PedidoProduto;
use PDF;

use Illuminate\Http\Request;

class ControladorPedido extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Produto::all();
        return view('pedidos', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('pedidoFinalizado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->cliente = $request->input('cliente');
        $pedido->obs = $request->input('obs');
        $pedido->entrega = $request->input('entrega');
        $pedido->frete = $request->input('frete');
        $pedido->save();

        $ped = $request->ped;
        $j=2;
        Foreach($ped as $p){
            $quant = $request->input('quant-'. $p);
            //echo "</br>funcionou : " .$quant;
            $pedido->produtos()->attach($p, ['quantidade'=> $request->input('quant-'. $p)]);
        }
        

        $preco = $pedido->frete;
        if (count($pedido->produtos)> 0) {
            foreach ($pedido->produtos as $prod) {
                $preco = $preco + ($prod->preco * $prod->pivot->quantidade);
            }

        }

        return view('pedidoFinalizado', compact('pedido', 'preco'));

        /*
        echo "<p>Nome do Cliente: ".$pedido->cliente. "</p>";
        echo "<p>Observações no Preparo: ".$pedido->obs. "</p>";
        echo "<p>Entrega: ".$pedido->entrega. "</p>";
        $preco = $pedido->frete;

        if (count($pedido->produtos)> 0) {
            echo "Pedidos: </br>";
            echo "<ul>";
                foreach ($pedido->produtos as $prod) {
                    echo "<li>";
                        echo $prod->nome . " | ";
                        echo " Quantidade: " . $prod->pivot->quantidade;
                        $preco = $preco + ($prod->preco * $prod->pivot->quantidade);
                    echo "</li>";
                }
                echo "</ul>";
            echo "Preço: " . $preco;
        }
        */

    }
    public function gerapdf($id){

        $view = view('vv');
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
