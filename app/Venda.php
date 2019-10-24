<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
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
}
