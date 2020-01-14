<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            'name' => 'Almacen Hogar',
            'document' => '700563313487',
            'email' => 'hogar@gmail.com',
            'phone' => '3090934937',
            'city_id' => '2',
            'address' => 'Carrera 20 #10-40'
        ]);

        DB::table('sellers')->insert([
            'name' => 'Tienda veterinaria Gómez',
            'document' => '129233137',
            'email' => 'vetegomez@gmail.com',
            'phone' => '30348344142',
            'city_id' => '2',
            'address' => 'Calle 23 #43-10'
        ]);
    }
}

