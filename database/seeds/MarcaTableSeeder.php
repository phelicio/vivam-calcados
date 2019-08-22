<?php

use Illuminate\Database\Seeder;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 40; $i++) { 
            DB::table('marcas')->insert([
                'nome' => Str::random(10),
            ]);
        }
            
    }
}
