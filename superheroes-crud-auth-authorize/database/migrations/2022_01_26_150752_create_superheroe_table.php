<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superheroe', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('edad');
            $table->date('fecha_nacimiento');
            $table->json('poderes');
            $table->enum('genero', ['hombre', 'mujer']);
            $table->string('descripcion');
            $table->string('vengador');
            $table->timestamps();
            //manera de referenciar foreingKey
            //$table->foreign('id')->references('id')->on('multiverso');
            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superheroe');
    }
}
