<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    const PAGAMENTO_CONCLUIDO = 1;
    const ENDERECO_PENDENTE = 2;
    const PRONTO_ENTREGA = 3;
    const PRODUTO_ENVIADO = 4;


    protected $fillable = ['dataEntrega', 'valorTotal', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'venda_produto')->withPivot(['modelo_id', 'quantidade']);
    }

    public function endereco()
    {
        return $this->belongsTo('App\Endereco');
    }

    public function getStatus(){


        $return = "ERRO";

        switch ($this->status) {
            case Venda::PAGAMENTO_CONCLUIDO:
                $return = "Pagamento concluido";
                break;

            case Venda::ENDERECO_PENDENTE:
                $return = "Aguardando a escolha do endereço";
                break;

            case Venda::PRONTO_ENTREGA:
                $return = "Produto pronto para ser enviado";
                break;

            case Venda::PRODUTO_ENVIADO:
                $return = "Produto enviado";
                break;

            default:

                break;
        }

        return $return;
    }

    public function valorTotal(){
        $return = 0;
        
        foreach ($this->produtos as $produto) {
            $return+= ($produto->valor * $produto->pivot->quantidade);
        }
        return $return;
    }
}
