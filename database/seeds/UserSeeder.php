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
        //Admin -> 1
        DB::table('users')->insert([
            'name' => 'Judy Zapata',
            'document' => '213617392',
            'email' => 'judyzh94@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        //Advisor -> 2
        DB::table('users')->insert([
            'name' => 'Yuliana Pérez Castañeda',
            'document' => '533546356',
            'email' => 'yuliana@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        //Advisor -> 3
        DB::table('users')->insert([
            'name' => 'Pedro Nel Morales Gómez',
            'document' => '18989239234',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        //Customer -> 4
        DB::table('users')->insert([
            'name' => 'Juliana Pérez',
            'document' => '1017221571',
            'email' => 'judy.766@hotmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

        //Suspended -> 5
        DB::table('users')->insert([
            'name' => 'Roberto Antonio Cardona Serna',
            'document' => '421841434',
            'email' => 'roberto@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);
    }
}

