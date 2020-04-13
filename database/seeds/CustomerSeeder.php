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
            'name' => 'Juliana',
            'last_name' => 'Pérez',
            'full_name' => 'Juliana Pérez',
            'document_type' => 'CC',
            'document' => '1017221571',
            'email' => 'judy.766@hotmail.com',
            'phone' => '30298401928',
            'city_id' => '1',
            'address' => 'Calle 56 #40-30'
        ]);

        DB::table('customers')->insert([
            'name' => 'Judy Marcela',
            'last_name' => 'Zapata Henao',
            'full_name' => 'Judy Marcela Zapata Henao',
            'document_type' => 'CC',
            'document' => '19001382',
            'email' => 'judyzh94@gmail.com',
            'phone' => '39472344321',
            'city_id' => '3',
            'address' => 'Carrera 25 #20-20'
        ]);

        DB::table('customers')->insert([
            'name' => 'Luis Pedro',
            'last_name' => 'González Mejía',
            'full_name' => 'Luis Pedro González Mejía',
            'document_type' => 'CC',
            'document' => '897492244',
            'email' => 'luis.zz@hotmail.com',
            'phone' => '398347934',
            'city_id' => '3',
            'address' => 'Calle 34 #40-30'
        ]);

        DB::table('customers')->insert([
            'name' => 'Maria Isabel',
            'last_name' => 'Mendez',
            'full_name' => 'Maria Isabel Mendez',
            'document_type' => 'CC',
            'document' => '347983854',
            'email' => 'maria@gmail.com',
            'phone' => '9873248147',
            'city_id' => '2',
            'address' => 'Calle 17 #10-20'
        ]);
    }
}

