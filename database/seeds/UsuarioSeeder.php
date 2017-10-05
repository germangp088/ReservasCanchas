<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nick' => 'Rodro',
            'clave' => bcrypt('secret'),//Cambiar por clave md5.
            'nombre' => 'Rodrigo',
            'apellido' => 'Vallaro',
            'nacimiento' => '23/10/1987',
            'email' => 'rodrigo.vallaro@gmail.com'
        ]);
		DB::table('usuarios')->insert([
            'nick' => 'germangp088',
            'clave' => bcrypt('secret'),
            'nombre' => 'German',
            'apellido' => 'Dario',
            'nacimiento' => '22/07/1991',
            'email' => 'germangp088@gmail.com'
        ]);
    }
}
