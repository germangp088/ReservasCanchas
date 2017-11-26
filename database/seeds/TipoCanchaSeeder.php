<?php

use Illuminate\Database\Seeder;

class TipoCanchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_canchas')->insert([
            'tamanio' => 5,
            'descripcion' => 'Cancha de 5'
        ]);
		DB::table('tipo_canchas')->insert([
            'tamanio' => 7,
            'descripcion' => 'Cancha de 7'
        ]);
		DB::table('tipo_canchas')->insert([
            'tamanio' => 9,
            'descripcion' => 'Cancha de 9'
        ]);
    }
}
