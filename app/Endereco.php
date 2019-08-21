<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['nome'];

    public function rua() { 
        return $this->belongsTo('App\Rua'); 
    }

    public function bairro() { 
        return $this->belongsTo('App\Bairro'); 
    }

    public function cidade() { 
        return $this->belongsTo('App\Cidade'); 
    }

    public function estado() { 
        return $this->belongsTo('App\Estado'); 
    }
}

 



