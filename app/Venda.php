<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function produtos(){
        return $this->belongsToMany('App\Produto')->withPivot(['modelo_id', 'quantidade']);
    }
}
