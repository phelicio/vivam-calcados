<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'logradouro', 
        'cep', 
        'bairro', 
        'cidade', 
        'estado_id', 
        'user_id', 
        'numero',
        'entrega24hrs'
    ];

    public function user() { 
        return $this->belongsTo('App\User'); 
    }

    public function estado() { 
        return $this->belongsTo('App\Estado'); 
    }

    public function vendas() { 
        return $this->hasMany('App\Venda'); 
    }

    public function getEndereco($id){
        $endereco = Endereco::find($id);
        
        return "$endereco->logradouro $endereco->numero, $endereco->bairro, $endereco->cidade - {$endereco->estado->sigla} , $endereco->cep";
    }
}

 



