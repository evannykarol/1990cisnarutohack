<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Ciscos.
 *
 * @author  Evanny k. Hernandez Garcia created at 2016-11-22 01:27:17pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Ciscos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('ciscos',function (Blueprint $table){

            $table->increments('id');

    
            $table->string('nombre')->nullable();
                   
    
            $table->string('correo')->nullable();
                   
    
            $table->string('telefono')->nullable();
                   
    

        
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('ciscos');
    }
}
