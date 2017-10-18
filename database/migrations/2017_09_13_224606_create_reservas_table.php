<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->integer('id_cancha')->unsigned();
			$table->foreign('id_cancha')->references('id')->on('canchas');
            $table->integer('id_user')->unsigned();
			$table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_turno')->unsigned();
			$table->foreign('id_turno')->references('id')->on('turnos');
            $table->date('fecha');
            $table->integer('senia');
            $table->string('codigo_reserva');
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
        Schema::dropIfExists('reservas');
    }
}
