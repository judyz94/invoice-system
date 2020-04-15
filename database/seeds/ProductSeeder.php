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
            'name' => 'Gimnasio gato',
            'unit_price' => '220000'
        ]);

        DB::table('products')->insert([
            'name' => 'Cama perro',
            'unit_price' => '80000'
        ]);

        DB::table('products')->insert([
            'name' => 'Caja de arena gato',
            'unit_price' => '240000'
        ]);

        DB::table('products')->insert([
            'name' => 'Comedero programable',
            'unit_price' => '900000'
        ]);

        DB::table('products')->insert([
            'name' => 'Guacal gato',
            'unit_price' => '150000'
        ]);

        DB::table('products')->insert([
            'name' => 'Paca de cuido Chunky adulto',
            'unit_price' => '75000'
        ]);
    }
}

