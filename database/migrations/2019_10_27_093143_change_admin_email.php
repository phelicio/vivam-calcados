<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAdminEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adm = \App\Admin::find(1);
        if($adm){
            $adm->login = "admin@vivam.online";
            $adm->save();
        }else{
            \App\Admin::create([
                'nome' => 'Admin',
                'login' => 'admin@vivam.online',
                'senha' =>  \Hash::make('123456')
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
