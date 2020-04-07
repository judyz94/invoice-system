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
                'name' => 'Judy Zapata',
            'email' => 'judyzh94@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        DB::table('users')->insert([
            'name' => 'Yuliana Pérez Castañeda',
            'email' => 'judy.766@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pedro Nel Morales Gómez',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        DB::table('users')->insert([
            'name' => 'Roberto Antonio Cardona Serna',
            'email' => 'roberto@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        DB::table('users')->insert([
            'name' => 'Lorena Díaz',
            'email' => 'lorena@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);
    }
}

