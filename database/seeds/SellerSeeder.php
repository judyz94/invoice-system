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
            'name' => 'Luis Zapata',
            'document' => '70056331',
            'email' => 'luisz@gmail.com',
            'phone' => '3090934937',
            'city_id' => '2',
            'address' => 'Carrera 20 #10-40'
        ]);
    }
}
