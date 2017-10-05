<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobantesPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes_pagos', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			
            $table->increments('id');
            $table->integer('id_reserva')->unsigned();
			$table->foreign('id_reserva')->references('id')->on('reservas');
            $table->integer('monto_total');
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
        Schema::dropIfExists('comprobantes_pagos');
    }
}
