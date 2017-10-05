<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanchasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canchas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->integer('id_tipo_cancha')->unsigned();
			$table->foreign('id_tipo_cancha')->references('id')->on('tipo_canchas');
            $table->integer('id_estado_cancha')->unsigned();
			$table->foreign('id_estado_cancha')->references('id')->on('estado_canchas');
            $table->float('latitud');
            $table->float('longitud');
            $table->integer('precio_dia');
            $table->integer('precio_noche');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canchas');
    }
}
