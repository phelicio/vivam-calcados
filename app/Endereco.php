<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['logradouro', 'cep', 'bairro', 'localidade', 'uf'];

    public function user() { 
        return $this->belongsTo('App\User'); 
    }
}

 



