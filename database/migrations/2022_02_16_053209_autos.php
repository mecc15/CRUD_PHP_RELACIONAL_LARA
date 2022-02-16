<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Autos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->engine="InnoDB";//borrado en cascada
            $table->bigIncrements('id');
            $table->string('modelo');
            $table->string('foto');
            $table->bigInteger('marcaId')->unsigned();//campo a relacionar
            $table->timestamps();
            $table->foreign('marcaId')->references('id')->on('marcas')->onDelete("cascade");//relacion

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
