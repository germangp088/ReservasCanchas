<?php

use Illuminate\Database\Seeder;

class EstadoCanchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_canchas')->insert([
            'descripcion' => 'Libre'
        ]);
		DB::table('estado_canchas')->insert([
            'descripcion' => 'Reservada'
        ]);
		DB::table('estado_canchas')->insert([
            'descripcion' => 'Cerrada'
        ]);
    }
}
