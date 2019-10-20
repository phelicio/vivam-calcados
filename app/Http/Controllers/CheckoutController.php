<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    public function checkoutPage(){

        $user = Auth::user();
        $provider = new ExpressCheckout;      

        try {

            $data = [];
            $data['items'] = array();
            
            foreach ($user->carrinho->produtos as $produto) {
                array_push($data['items'], array(
                    'name' => $produto->nome,
                    'price' => $produto->valor,
                    'desc' => '',
                    'qty' => $produto->pivot->quantidade
                ));
            }
            $data['invoice_id'] = uniqid();
            $data['invoice_description'] = "Pedido #{$data['invoice_id']}";
            $data['return_url'] = route('home');
            $data['cancel_url'] = route('carrinho.carrinho');
           
            
            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
            }
            
            
            $data['total'] = $total;
            $response = $provider->setExpressCheckout($data);

            return redirect($response['paypal_link']);
        } catch (Exception $e) {
            dd($e->__toString());
        }

    }

    public function store(){
        
        $user = Auth::user();    
        
        $venda = Venda::create([
            'dataEntrega' => time(),
            'valorTotal' => $user->carrinho->valorTotal(),
            'status' => '1'
        ]);
        
        $venda->produtos()->attach($user->carrinho->produtos);
        $venda->associate($user);
        $user->carrinho->produtos()->detach();
    }

}
