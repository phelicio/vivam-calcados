<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use URL;
use Redirect;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\ItemList;
use PayPal\Api\Item;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Details;

class CheckoutController extends Controller
{

    public function __construct()

    {
        $paypal_conf = \Config::get('paypal');
      $this->_api_context = new ApiContext(new OAuthTokenCredential(

           $paypal_conf['client_id'],
           $paypal_conf['secret'])
       );

       $this->_api_context->setConfig($paypal_conf['settings']);
    }




    public function checkoutPage(){

        $user = Auth::user();
        $pagador = new Payer();
        $pagador->setPaymentMethod('paypal');
     
        $lista_itens = new ItemList();
        $total = 0;
        $items = array();

        foreach ($user->carrinho->produtos as $produto) {
            
            $item = new Item();
            $item->setName($produto->nome)-> setCurrency('BRL')->setQuantity($produto->pivot->quantidade)->setPrice(($produto->valor*$produto->pivot->quantidade));
            $total+= $produto->pivot->quantidade * $produto->valor;
            array_push($items, $item);

        }
        
        $lista_itens->setItems($items);

        $valor = new Amount();
        $valor->setCurrency('BRL')->setTotal($total);
     
        $transacao = new Transaction();
        $transacao->setAmount($valor)->setItemList($lista_itens)->setDescription('Pedido');

        $urls_redirecionamento = new RedirectUrls();
        $urls_redirecionamento->setReturnUrl(URL::route('checkoutStore'))->setCancelUrl(URL::route('carrinho.carrinho'));
     
        $pagamento = new Payment();
        $pagamento->setIntent('Sale')->setPayer($pagador)->setRedirectUrls($urls_redirecionamento)->setTransactions(array($transacao));
     
        try {
     
            $pagamento->create($this ->_api_context);
     
        } catch (\PayPal\Exception\PPConnectionException $e) {
     
            if (\Config::get('app.debug')) {\
     
                Session::put('error', 'Tempo Limite de Conexão Excedido');
                return Redirect::route('home');
            } else {\
     
                Session::put('error', 'Serviço fora do ar, tente novamente mais tarde.');
                return Redirect::route('home');
            }
     
        }
     
        foreach($pagamento->getLinks() as $link) {
     
            if ($link->getRel() == 'approval_url') {
     
                $url_redirecionar = $link->getHref();
     
                return Redirect::to($url_redirecionar);
                
            }
            
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

        return redirect()->route('home');
    }

    public function index(){

        return view('pedidos');
    }

    public function pagarComPayPal(Request $request) {

        
    }

}
