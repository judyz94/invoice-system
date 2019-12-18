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
            'name' => 'Mueble',
        ]);

        DB::table('products')->insert([
            'name' => 'Pintura',
        ]);

        DB::table('products')->insert([
            'name' => 'Laptop',
        ]);

        DB::table('products')->insert([
            'name' => 'Celular',
        ]);

        DB::table('products')->insert([
            'name' => 'Juego de mesa',
        ]);

    }
}
