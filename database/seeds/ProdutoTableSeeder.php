<?php

use Illuminate\Database\Seeder;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = array(
            array(
                'nome' => '1'
            ),
            array(
                'nome' => '2'
            ));
        foreach ($categorias as $categoria) {
            
            App\Categoria::create($categoria);
        }

        $marcas = array(
            array(
                'nome' => '1'
            ),
            array(
                'nome' => '2'
            ));
        foreach ($marcas as $marca) {
            
            App\Marca::create($marca);
        }

        $modelos = array(
            array(
                'tamanho' => '1',
                'quantidade' => '100'
            ),
            array(
                'tamanho' => '2',
                'quantidade' => '100'
            ));

        foreach ($marcas as $marca) {
            
            App\Marca::create($marca);
        }

        $produtos = array(
            
            array(
                'nome' => '1',
                'marca_id' => 1,
                'imagem' => '1.png',
                'cor' => '1',
                'cor_html' => '#fff',
                'valor' => 1.0
            ),
            array(
                'nome' => '2',
                'marca_id' => 2,
                'imagem' => '2.png',
                'cor' => '2',
                'cor_html' => '#fff',
                'valor' => 2.0
            ),
            
        );
    }
}
