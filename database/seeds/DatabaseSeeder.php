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
		$this->call(UsuarioSeeder::class);
		$this->call(CanchaSeeder::class);
		$this->call(ReservasSeeder::class);
		$this->call(TurnosSeeder::class);
    }
}
