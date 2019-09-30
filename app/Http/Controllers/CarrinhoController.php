<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Modelo;
use Auth;

class CarrinhoController extends Controller
{
    public function __construct()
    {
    }

    public function addProduto(Request $request)
    {
        $carrinho = Auth::user()->carrinho;
        $produto = Produto::find($request->input('produto'));
        $modeloId = ($request->input('modelo'));
        $quantidade = ($request->input('quantidade'));


        $carrinho->produtos()->attach($produto, ['modelo_id' => $modeloId, 'quantidade' => $quantidade]);
        
        $modelo = Modelo::find($modeloId);
        $modelo->quantidade-=$quantidade;
        $modelo->save();
        
        return redirect()->route('produtos.catalogo', ['mensagem' => "Produto adicionado com sucesso!"]);
    }
    

    public function show()
    {
        return view('carrinho', ['carrinho' => Auth::user()->carrinho()]);
    }

}
