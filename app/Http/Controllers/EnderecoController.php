<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Endereco;
use App\Estado;
use App\Venda;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('endereco',['estados' =>  Estado::all(), 'user' => Auth::user()]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = Estado::where('sigla', $request->estado)->first();
        $userId = Auth::user()->id;

        $entrega24hrs = false;
        $cidade = strtolower($request->cidade);

        if(strtolower($estado->nome) === "ceará" && ($cidade === 'juazeiro do norte' || $cidade === 'crato'|| $cidade === 'barbalha'))
            $entrega24hrs = true; 

        $endereco = Endereco::create([
            'cep' => $request->cep,
            'numero' => $request->numero,
            'logradouro' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado_id' => $estado->id,
            'user_id' => $userId,
            'entrega24hrs' => $entrega24hrs
        ]);

        
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::find($id);
        return view('endereco', ['endereco', $endereco]);
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
    
    public function entrega($id){
        $venda = Venda::find($id);
        return view('enderecoEscolha',['estados' =>  Estado::all(), 'user' => Auth::user(), 'venda' => $id]);
        return back();
    }
}
