<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('empleado', function (Blueprint $table) {
        $table->engine="InnoDB";//borrado en cascada
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('foto');
        $table->bigInteger('deptoId')->unsigned();//campo a relacionar
        $table->timestamps();
        $table->foreign('deptoId')->references('id')->on('departamento')->onDelete("cascade");//relacion

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
