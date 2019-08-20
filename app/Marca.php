<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    function produtos(){
        return $this->hasMany('App\Produto');
    }

}
