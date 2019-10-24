<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'nome' => Str::random(10),
            'login' => 'joão@joao.com',
            'senha' =>  \Hash::make('123456'),
        ]);
    }
}
