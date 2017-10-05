<?php

use Illuminate\Database\Seeder;

class CanchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('canchas')->insert([
			'id_tipo_cancha' => 1,
			'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
			'precio_dia' => 1000,
			'precio_noche' => 1200
        ]);
    }
}
