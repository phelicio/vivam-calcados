<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Marca;
use \DB;

use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.produto.produtos', ['produtos' => (Produto::paginate(28))]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produto.novoProduto', ['categorias' => Categoria::all(), 'marcas' => Marca::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        
        $produto = Produto::create($request->except(['categoria_id', 'imagem']));
        if($request->only('categoria_id')){

            $categorias = Categoria::findMany($request->only('categoria_id')['categoria_id']);
            $produto->categorias()->attach($categorias);
        }

        $imagem = $request->imagem;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
             $name = $produto->id;
             $extension = $request->imagem->extension();
             $nameFile = "{$name}.{$extension}";
             $produto->imagem = "{$produto->id}.{$request->imagem->extension()}";
             $produto->save();
             $request->imagem->storeAs('produto', $nameFile);
        }
       
        return redirect()->route('produtos.index')->with('mensagem' , 'Produto adicionado com sucesso!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('produto.show', ['produto' => Produto::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categoriasIds = array();

        foreach ($produto->categorias as $categoria) {
            array_push($categoriasIds, $categoria->id);
        }

        return view('admin.produto.novoProduto', [
            'produto' => $produto,
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
            'categoriasIds' => $categoriasIds
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update($request->except('categoria_id'));
        $produto->categorias()->detach();
        if($request->only('categoria_id')){

            $categorias = Categoria::findMany($request->only('categoria_id')['categoria_id']);
            $produto->categorias()->attach($categorias);
        }        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
       
            $name = $produto->id;
            $extension = $request->imagem->extension();
            $nameFile = "{$name}.{$extension}";
            $produto->imagem = $nameFile;
            $request->imagem->storeAs('produto', $nameFile);
            $produto->save();
       }

       return redirect()->route('produtos.index')->with('mensagem', 'Produto salvo com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Produto::find($id)->delete();
        }catch(Exception $e ) {
            return back();
        }
        return redirect()->route('produtos.index');
    }


    public function catalogo(Request $request){

        $categoria = $request->input('categoria')? $request->input('categoria'): "";
        dd(request()->all());
        if(!empty($categoria)){
            $produtos = DB::table('categoria_produto')
                            ->join('produtos', 'produtos.id', '=', 'categoria_produto.produto_id')
                            ->join('categorias', 'categorias.id', '=', 'categoria_produto.categoria_id')
                            ->where('categorias.nome', '=', $categoria)
                            ->select('produtos.*')
                            ->get();

        } else {
            $produtos = Produto::all();
        }

        return view('produto.catalogo',[
            'produtos' => $produtos,
            'categorias' => Categoria::all()
        ]);
    }
}
