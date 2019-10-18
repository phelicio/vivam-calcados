<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Produto;
use App\Categoria;
use App\Marca;
use App\Modelo;
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
        
        $produto = Produto::create($request->except(['categoria_id', 'imagem', 'quantidade', 'tamanho', 'newModelo']));

        $modelos = $request->only(['newModelo'])['newModelo'];
        foreach ($modelos as $modelo) {

            $produto->modelos()->updateOrCreate($modelo);
        }

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
        $produto->update($request->except(['categoria_id', 'imagem', 'quantidade', 'tamanho','modelo', 'newModelo']));
        $produto->categorias()->detach();
        $produto->modelos()->delete();

        $modelos = array();
        if($request->only('newModelo')){
            foreach ($request->only('newModelo')['newModelo'] as $modelo) {
                array_push($modelos, $modelo);
            }
        }

        if($request->only('modelo')){
            foreach ($request->only('modelo')['modelo'] as $modelo) {
                array_push($modelos, $modelo);
            }
        }
        foreach ($modelos as $modelo) {

            $produto->modelos()->updateOrCreate($modelo);
        }

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
        $tamanho = $request->input('tamanho')? $request->input('tamanho'): "";
        $cor = $request->input('cor')? $request->input('cor'): "";
        $marca = $request->input('marca')? $request->input('marca'): "";
        $produto = new Produto;
        $produtos = new Collection;

        if(!empty($categoria) || !empty($tamanho) || !empty($cor) || !empty($marca)){

            if(!empty($categoria)){
                
                $produtosCollection = $produto->whereHas('categorias', function (Builder $query) {
                    $query->where('nome', '=', \Request::query('categoria'));
                })->get();
                
                foreach ($produtosCollection as $produto) {
                    
                    $produtos->push($produto);
                }
            }
            
            if(!empty($tamanho)){

                $produtosCollection = $produto->whereHas('modelos', function (Builder $query) {
                    $query->where('tamanho', '=', \Request::query('tamanho'));
                })->get();
                
                foreach ($produtosCollection as $produto) {
                    
                    $produtos->push($produto);
                }
            }
        
            if(!empty($cor)){
                
                $produtosCollection = $produto->whereHas('modelos', function (Builder $query) {
                    $query->where('cor', '=', \Request::query('cor'));
                })->get();
                
                foreach ($produtosCollection as $produto) {
                    
                    $produtos->push($produto);
                }
            }
            
            if(!empty($marca)){
                
                $produtosCollection = $produto->whereHas('marcas', function (Builder $query) {
                    $query->where('nome', '=', \Request::query('marca'));
                })->get();
                
                foreach ($produtosCollection as $produto) {
                    
                    $produtos->push($produto);
                }
            }
    
        }else {

            $produtos = Produto::all();
        }
        
        $cores = DB::table('produtos')->select('cor as nome', 'cor_html as html')->distinct()->get();
        $tamanhos = DB::table('modelos')->select('tamanho as nome')->distinct()->get();

        return view('produto.catalogo',[
            'produtos' => $produtos,
            'categorias' => Categoria::all(),
            'marcas' => Marca::all(),
            'cores' => $cores,
            'tamanhos' => $tamanhos
        ]);
    }
}
