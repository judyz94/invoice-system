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
    }
}

