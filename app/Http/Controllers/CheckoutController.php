<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class CheckoutController extends Controller
{
    public function checkout(){

        $user = Auth::user();
        $carrinho = $user->carrinho;

        return view('checkout',['user' => $user, 'carrinho' => $carrinho]);
    }
}
