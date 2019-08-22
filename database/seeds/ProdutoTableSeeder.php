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
        for($i=0; $i < 40; $i++) { 
            DB::table('produtos')->insert([
                'nome' => Str::random(10),
                'quantidade' => rand(10, 100),
                'valor' => rand(10, 100),
                'tamanho' => rand(10, 38),
                'imagem' => Str::random(10),
                'marca_id' => rand(1, 40),
            ]);   
        } 
    }
}
