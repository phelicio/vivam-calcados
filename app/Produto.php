<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'quantidade', 'valor', 'tamanho', 'imagem', 'marca_id', 'categoria_id'];

    public function categorias()
    {
        return $this->belongsToMany('App\Produto', 'categoria_produto', 'categoria_id', 'produto_id');
    }


    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
}
