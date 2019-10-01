<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Modelo;
use App\Carrinho;
use Auth;

class CarrinhoController extends Controller
{

    public function addProduto(Request $request)
    {
        $carrinho = Auth::user()->carrinho;
        $produto = Produto::find($request->input('produto'));
        $modeloId = ($request->input('modelo'));
        $quantidade = ($request->input('quantidade'));
        $duplicado = $carrinho->produtos()->wherePivot('modelo_id', $modeloId)->wherePivot('produto_id', $produto->id)->first();
        
        if(!$duplicado){

            $carrinho->produtos()->attach($produto, ['modelo_id' => $modeloId, 'quantidade' => $quantidade]);
            $modelo = Modelo::find($modeloId);
            $modelo->quantidade-=$quantidade;
            $modelo->save();
            return redirect()->route('produtos.catalogo')->with('mensagemSucesso', "Produto adicionado com sucesso!");
        }else {

            return redirect()->route('produtos.catalogo')->with('mensagemErro', "Esse produto já se encontra no seu carrinho!");
        }
    }
    

    public function show()
    {
        return view('carrinho', ['carrinho' => Auth::user()->carrinho]);
    }

    public function rmvProduto($carrinho,$modelo,$id)
    {
        $carrinho = Carrinho::find($carrinho);
        $carrinho->produtos()->wherePivot('modelo_id', $modelo)->wherePivot('produto_id', $id)->detach();

        return redirect()->route('carrinho.carrinho', ['carrinho' => $carrinho]);
    }
}
