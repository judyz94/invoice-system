<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Bogotá',
        ]);

        DB::table('cities')->insert([
            'name' => 'Medellín',
        ]);

        DB::table('cities')->insert([
            'name' => 'Cali',
        ]);

        DB::table('cities')->insert([
            'name' => 'Cartagena',
        ]);
    }
}

