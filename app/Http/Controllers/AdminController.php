<?php

namespace App\Http\Controllers;
use App\Produto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function settings(){
        return view('admin.settings');
    }

    public function saveSettings(){
    }
}
