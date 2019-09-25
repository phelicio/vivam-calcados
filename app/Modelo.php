<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{

    protected $fillable = ['cor', 'quantidade', 'tamanho', 'imagem'];


    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
