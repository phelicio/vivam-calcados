<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    public function produtos(){
        return $this->belongsToMany('App\Produto');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
