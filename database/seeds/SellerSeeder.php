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
            'name' => 'Cristina',
            'last_name' => 'Sanchez (Hogar Perritos)',
            'full_name' => 'Cristina Sanchez ',
            'document_type' => 'CC',
            'document' => '700563313487',
            'email' => 'hogarperritos@gmail.com',
            'phone' => '3090934937',
            'city_id' => '2',
            'address' => 'Carrera 20 #10-40'
        ]);

        DB::table('sellers')->insert([
            'name' => 'Tienda veterinaria Gómez',
            'full_name' => 'Tienda veterinaria Gómez ',
            'document_type' => 'NIT',
            'document' => '129233137787',
            'email' => 'vetegomez@gmail.com',
            'phone' => '30348344142',
            'city_id' => '2',
            'address' => 'Calle 23 #43-10'
        ]);

        DB::table('sellers')->insert([
            'name' => 'Proveedora Chunky',
            'full_name' => 'Proveedora Chunky',
            'document_type' => 'NIT',
            'document' => '12748221847',
            'email' => 'chunky@gmail.com',
            'phone' => '30676246824',
            'city_id' => '2',
            'address' => 'Carrera 50 #43-10'
        ]);

        DB::table('sellers')->insert([
            'name' => 'Universo mascotas',
            'full_name' => 'Universo mascotas',
            'document_type' => 'NIT',
            'document' => '121432546',
            'email' => 'umascotas@gmail.com',
            'phone' => '30227814343',
            'city_id' => '2',
            'address' => 'Avenida 24 #33-10'
        ]);
    }
}

