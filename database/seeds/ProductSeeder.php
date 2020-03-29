<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Sofá',
            'unit_price' => '220000'
        ]);

        DB::table('products')->insert([
            'name' => 'Pintura',
            'unit_price' => '80000'
        ]);

        DB::table('products')->insert([
            'name' => 'Laptop',
            'unit_price' => '2400000'
        ]);

        DB::table('products')->insert([
            'name' => 'Celular',
            'unit_price' => '900000'
        ]);

        DB::table('products')->insert([
            'name' => 'Juego de mesa',
            'unit_price' => '50000'
        ]);

        DB::table('products')->insert([
            'name' => 'Paca de cuido',
            'unit_price' => '75000'
        ]);
    }
}

