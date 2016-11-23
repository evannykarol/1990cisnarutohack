<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->increments('id_catalogs');
            $table->string('catalogs');
            $table->string('description');
            $table->string('viewcatalog');
            $table->string('status');
        });
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id_client');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
        });
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id_department');
            $table->string('Department');
        });
        Schema::create('permission_catalogs', function (Blueprint $table) {
            $table->increments('id_permission_catalogs');
            $table->integer('id_users');
            $table->integer('id_catalogs');
            $table->integer('create');
            $table->integer('read');
            $table->integer('update');
            $table->integer('delete');
        });             
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
