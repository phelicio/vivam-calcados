<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Endereco;

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

    public function login($request){
        Admin::where('login', '=' , $request->login)->andWhere('password', '=', bcrypt($request->password));
    }
}
