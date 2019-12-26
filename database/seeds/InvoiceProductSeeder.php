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
            'price' => '450000',
            'quantity' => '1'
        ]);

        DB::table('invoice_product')->insert([
            'invoice_id' => '1',
            'product_id' => '2',
            'price' => '98000',
            'quantity' => '2'
        ]);
    }
}

