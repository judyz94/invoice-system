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
            'name' => 'Yuliana Pérez',
            'email' => 'judy.766@gmail.com',
            'password' => bcrypt('judyzapata94%'),
        ]);

    }
}

