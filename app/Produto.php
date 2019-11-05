<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','cor','cor_html', 'quantidade', 'valor', 'tamanho', 'imagem', 'marca_id', 'categoria_id'];

    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'categoria_produto','produto_id', 'categoria_id');
    }

    public function carrinhos()
    {
        return $this->belongsToMany('App\Carrinho', 'carrinho_produto', 'produto_id', 'categoria_id')->withPivot(['modelo_id', 'quantidade']);
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function modelos()
    {
        return $this->hasMany('App\Modelo');
    }

    //Quantidade do produto
    public function quantidadeTotal(){
        
        $return = 0;

        foreach ($this->modelos as $modelo) {
            $return+=$modelo->quantidade;
        }
        return $return;
    }

    //Retorna o tamanho do calçado de acordo com o modelo
    public function sizePerModelo($modelo){
        $modelo = Modelo::find($modelo);
        if ($modelo)
        return $modelo->tamanho;
    }
}
