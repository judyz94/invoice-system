<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Marcela Zapata',
            'role' => 'Administrador',
            'email' => 'judyzh94@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);
    }
}

