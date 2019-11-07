<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use URL;
use Redirect;
use App\Venda;
use App\Endereco;
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




    public function checkoutPage(Request $request){
        
        $user = Auth::user();
        $endereco = Endereco::find($request->endereco);

        if(!$endereco || !$endereco->entrega24hrs ) return back();

        $venda = Venda::create([
            'dataEntrega' => date('Y-m-d' ,strtotime("+1 day")),
            'valorTotal' => $user->carrinho->valorTotal(),
            'status' => '2',
            'user_id' => $user->id,
        ]);
        $venda->endereco()->associate($endereco);
        $venda->save();

        foreach ($user->carrinho->produtos as $produto) {
            
            $venda->produtos()->attach($produto, 
            [
                'modelo_id' => $produto->pivot->modelo_id,
                'quantidade' => $produto->pivot->quantidade,
                'valor' => $produto->valor
            ]);
        }
        
        $user->carrinho->produtos()->detach();

        $pagador = new Payer();
        $pagador->setPaymentMethod('paypal');
        
        $lista_itens = new ItemList();
        $total = 0;
        $items = array();

      

        foreach ($venda->produtos as $produto) {
            
            $item = new Item();
            $item->setName($produto->nome)-> setCurrency('BRL')->setQuantity($produto->pivot->quantidade)->setPrice(($produto->valor));
            $total+= $produto->pivot->quantidade * $produto->valor;
            array_push($items, $item);

        }
        
        $lista_itens->setItems($items);
        $valor = new Amount();
        $valor->setCurrency('BRL')->setTotal($total);
     
        $transacao = new Transaction();
        $transacao->setAmount($valor)->setItemList($lista_itens)->setDescription('Pedido');

        $urls_redirecionamento = new RedirectUrls();
        $urls_redirecionamento->setReturnUrl(URL::route('checkoutStore', ['venda' => $venda->id]))
                              ->setCancelUrl(URL::route('carrinho.carrinho'));
     
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

    public function store(Request $request){
        
        $venda = Venda::find($request->venda);
        $venda->status = 3;
        $venda->save();

        return view('compraConcluida', ['venda' => $venda]);
    }

    public function index(){

        return view('pedidos');
    }

    

    public function compras(){

        $vendas = Auth::user()->vendas;

        return view('compras',['vendas' => $vendas]);
    }

    public function pedido($id){

        $venda = Venda::find($id);
        if(!(Auth::user() == $venda->user)) return back();
        
        return view('pedido', ['venda' => $venda]);
    }
}
