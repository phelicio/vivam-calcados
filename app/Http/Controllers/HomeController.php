<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $produtos = Produto::latest('created_at')->limit(10)->get();
        $categorias = Categoria::all();
        return view('home', ['produtosRecentes' => $produtos, 'categorias' => $categorias ]);
    }

    public function sobre()
    {
        
        return view('sobre');
    }
}
