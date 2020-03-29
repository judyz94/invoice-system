<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice_product')->insert([
            'invoice_id' => '1',
            'product_id' => '1',
            'price' => '220000',
            'quantity' => '1'
        ]);

        DB::table('invoice_product')->insert([
            'invoice_id' => '1',
            'product_id' => '2',
            'price' => '80000',
            'quantity' => '2'
        ]);

        DB::table('invoice_product')->insert([
            'invoice_id' => '2',
            'product_id' => '4',
            'price' => '900000',
            'quantity' => '1'
        ]);

        DB::table('invoice_product')->insert([
            'invoice_id' => '3',
            'product_id' => '6',
            'price' => '75000',
            'quantity' => '5'
        ]);

        DB::table('invoice_product')->insert([
            'invoice_id' => '4',
            'product_id' => '3',
            'price' => '2400000',
            'quantity' => '1'
        ]);
    }
}

