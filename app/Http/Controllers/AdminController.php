<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Endereco;
use App\Admin;

class AdminController extends Controller
{


    public function settings(){
        return view('admin.settings');
    }

    public function saveSettings(){

    }

    public function loginPage(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        
        $admin = Admin::where('login', $request->email)->first();
        if(\Hash::check($request->password, $admin->senha)){
            session_start();
            $_SESSION['is_admin'] = true;
            return redirect()->route('produtos.index');
        }
        return back();
    }

    public function logout(){
        session_start();
        $_SESSION['is_admin'] = false;
        return redirect()->route('admin.loginPage');
    }

    public function historico(){
        
        $vendas = \App\Venda::all();
        return view('admin.vendas', [ 'vendas' => $vendas ]);
    }

    public function acoesVendas(Request $request){
        
        $vendas = \App\Venda::findMany($request->vendas);

        foreach ($vendas as $venda) {

            $venda->status = 4;
            $venda->save();
        }
        
        return redirect()->route('admin.vendas');
    }

}
