<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Maria Velez',
            'document' => '1017221571',
            'email' => 'maria@gmail.com',
            'phone' => '30298401928',
            'city_id' => '1',
            'address' => 'Calle 56 #40-30'
        ]);

        DB::table('customers')->insert([
            'name' => 'Carlos Holguín',
            'document' => '213833432',
            'email' => 'carlos2@gmail.com',
            'phone' => '39472344321',
            'city_id' => '3',
            'address' => 'Carrera 25 #20-20'
        ]);
    }
}

