<?php

use Illuminate\Database\Seeder;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i = 12; $i <= 23; $i++) {
			DB::table('turnos')->insert([
				'hora' => $i,
				'noche'=>($i >= 19)
			]);
		}
    }
}
