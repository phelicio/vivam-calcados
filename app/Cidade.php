<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome'];


    public function enderecos() { 
        return $this->hasMany('App\Endereco'); 
    }
}
