<?php

use Illuminate\Database\Seeder;

class CanchaTurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i = 1; $i <= 12; $i++) {
			DB::table('canchas_turnos')->insert([
				'id_cancha' => 1,
				'id_turno' => $i,
            	'reservada' => 0
        	]);
		}
    }
}
