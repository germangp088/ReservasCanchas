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
            'nombre' => 'Paris',
			'id_tipo_cancha' => 1,
			'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
			'precio_dia' => 1500,
			'precio_noche' => 1750
        ]);

        DB::table('canchas')->insert([
            'nombre' => 'Dubai',
            'id_tipo_cancha' => 1,
            'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
            'precio_dia' => 1500,
            'precio_noche' => 1750
        ]);

        DB::table('canchas')->insert([
            'nombre' => 'Tokyo',
            'id_tipo_cancha' => 2,
            'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
            'precio_dia' => 2200,
            'precio_noche' => 2500
        ]);

        DB::table('canchas')->insert([
            'nombre' => 'New York',
            'id_tipo_cancha' => 2,
            'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
            'precio_dia' => 2200,
            'precio_noche' => 2500
        ]);

        DB::table('canchas')->insert([
            'nombre' => 'Buenos Aires',
            'id_tipo_cancha' => 3,
            'id_estado_cancha' => 1,
            'latitud' => 555,
            'longitud' => 287,
            'precio_dia' => 2600,
            'precio_noche' => 3000
        ]);
    }
}
