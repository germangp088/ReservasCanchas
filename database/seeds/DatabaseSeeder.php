<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(EstadoCanchaSeeder::class);
		$this->call(TipoCanchaSeeder::class);
		$this->call(UserSeeder::class);
		$this->call(CanchaSeeder::class);
		$this->call(ReservasSeeder::class);
		$this->call(TurnosSeeder::class);
        $this->call(CanchaTurnoSeeder::class);
    }
}
