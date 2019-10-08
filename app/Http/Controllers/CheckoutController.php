<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Moip;

class CheckoutController extends Controller
{
    public function checkoutPage(){

        $user = Auth::user();
        $carrinho = $user->carrinho;

        return view('checkout',['user' => $user, 'carrinho' => $carrinho]);
    }

    public function checkout(Request $request){

        $user = Auth::user();
        $moip = Moip::start();

        try {

            $cliente = $moip->customers()->setOwnId(uniqid())
                ->setFullname($user->name)
                ->setEmail($user->email)
                ->setBirthDate($request->dataNascimento)
                ->setTaxDocument($request->cpf)
                ->setPhone($request->ddd, $request->telefone)
                ->addAddress('BILLING',
                    'Rua de teste', 123,
                    'Bairro', 'Ceara', 'CE',
                    '01234567', 8)
                ->addAddress('SHIPPING',
                          'Rua de teste do SHIPPING', 123,
                          'Bairro do SHIPPING', 'Ceara', 'CE',
                          '01234567', 8)
                ->create();

                $venda = $moip->orders()->setOwnId(uniqid());

                foreach ($user->carrinho->produtos as $key => $produto) {
                    $venda->addItem($produto->nome , $produto->pivot->quantidade, "item-".$key, $produto->valor);
                }

                
                $venda->setShippingAmount(1)
                ->setCustomer($cliente)
                ->create();
                
                $pagamento = $venda->payments()->setCreditCard($request->validadeMes, $request->validadeAno, $request->numero,  $request->codigoSeguranca, $cliente)
                ->execute();


        } catch (Exception $e) {
            dd($e->__toString());
        }
    }
}
