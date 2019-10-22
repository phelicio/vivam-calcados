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
        $estadoId = Estado::where('sigla', $request->estado)->first()->id;
        $userId = Auth::user()->id;

        $endereco = Endereco::create([
            'cep' => $request->cep,
            'numero' => $request->numero,
            'logradouro' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado_id' => $estadoId,
            'user_id' => $userId
        ]);


        return redirect()->route('enderecos');
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
