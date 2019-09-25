<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','cor', 'quantidade', 'valor', 'tamanho', 'imagem', 'marca_id', 'categoria_id'];

    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'categoria_produto','produto_id', 'categoria_id');
    }


    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function modelos()
    {
        return $this->hasMany('App\Modelo');
    }
}
