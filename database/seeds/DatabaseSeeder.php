<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaTableSeeder::class);
        $this->call(MarcaTableSeeder::class);
        $this->call(ProdutoTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
    }
}
