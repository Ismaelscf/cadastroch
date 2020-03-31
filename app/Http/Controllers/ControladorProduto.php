<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Produto::all();
        return view('produtos', compact('prod'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Categoria::all();
        return view('novoproduto', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomeProduto'=> 'required|min:3|max:20|unique:produtos,nome'
        ]);

        $prod = new Produto();
         $prod->nome = $request->input('nomeProduto');
         $prod->descricao = $request->input('descProduto');
         $prod->preco = $request->input('precoProduto');
         $prod->categoria_id = $request->input('catProduto');
         $prod->save();


         return redirect('/produtos');
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
        $prod = Produto::find($id);
        if(isset($prod)) {
            return view('editarproduto', compact('prod'));
        }
        return redirect('/produtos');
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

        $prod = Produto::find($id);
        if(isset($prod)) {
            $prod->nome = $request->input('nomeProduto');
            $prod->descricao = $request->input('descProduto');
            $prod->preco = $request->input('precoProduto');
            $prod->save();
           
        }
        return redirect('/produtos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)) {
            $prod->delete();
        }
        return redirect('/produtos'); 
    }
}
