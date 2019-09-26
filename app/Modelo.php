<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{

    protected $fillable = ['cor', 'quantidade', 'tamanho', 'produto_id'];


    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
