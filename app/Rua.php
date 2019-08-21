<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rua extends Model
{
    protected $fillable = ['nome'];

    public function enderecos() { 
        return $this->hasMany('App\Endereco'); 
    }
}
