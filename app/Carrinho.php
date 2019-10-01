<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    public function produtos(){
        return $this->belongsToMany('App\Produto')->withPivot(['modelo_id', 'quantidade']);
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function valorTotal(){
        $return = 0;
        
        foreach ($this->produtos as $produto) {
            $return+= $produto->valor;
        }
        return $return;
    }
}
