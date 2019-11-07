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
        $modelo = Modelo::find($modeloId);
        
        if($modeloId){

            if($modelo)
            if($quantidade > $modelo->quantidade){
                
                return back()->with('mensagemErro', "Quantidade excedida!");
            }
            
            $this->verificaCarrinho($carrinho);
            
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
        }else return back()->with('mensagemErro', 'É necessário selecionar o tamanho do produto!');
        
    }
    
    private function verificaCarrinho($carrinho){
        
        if(!$carrinho){

            Auth::user()->carrinho()->create();
            $carrinho = Auth::user()->carrinho;
        }
    }

    public function show()
    {
        $carrinho = Auth::user()->carrinho;
        $this->verificaCarrinho($carrinho);
        return view('carrinho', ['carrinho' => $carrinho]);
    }

    public function rmvProduto($carrinho,$modelo,$id)
    {
        $carrinho = Carrinho::find($carrinho);
        $this->verificaCarrinho($carrinho);
        $carrinho->produtos()->wherePivot('modelo_id', $modelo)->wherePivot('produto_id', $id)->detach();

        return redirect()->route('carrinho.carrinho', ['carrinho' => $carrinho]);
    }

    public function update(Request $request){
         
        $user = Auth::user();   

        foreach ($request->produto as $produtoValue) {
            $produto = $user->carrinho->produtos()->withPivot(['quantidade', 'modelo_id'])->find($produtoValue["produto"]);
            
            if($produto->pivot->quantidade != $produtoValue["quantidade"]){
                
                $diferenca = $produto->pivot->quantidade - $produtoValue["quantidade"];

                $modelo = \App\Modelo::find($produto->pivot->modelo_id);
                $modelo->quantidade+=$diferenca;    
                $modelo->save();

                $produto->pivot->quantidade = $produtoValue["quantidade"];
                $produto->pivot->save();
            }
        }

        return redirect()->action('EnderecoController@entrega');
        
    }
}
