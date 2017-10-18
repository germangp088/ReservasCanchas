<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'admin' => '1'
        ]);
		DB::table('users')->insert([
			'name' => 'germangp088',
            'email' => 'germangp088@gmail.com',
            'password' => bcrypt('germangp088'),
            'admin' => '0'
        ]);
    }
}
