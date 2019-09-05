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
        
        $admin = Admin::where('login', $request->email)->where('senha', $request->password)->first();
        if(!empty($admin)){
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

}
