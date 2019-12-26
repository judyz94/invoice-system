<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert([
            'code' => 'A0001',
            'expedition_date' => '2019-11-19',
            'due_date' => '2020-01-10',
            'receipt_date' => '2019-11-25',
            'seller_id' => '1',
            'sale_description' => '1 sofá negro de cuero y 1 pintura',
            'customer_id' => '1',
            'vat' => '0.19',
            'total' => '646000',
            'total_with_vat' => '768740',
            'status' => '1',
            'user_id' => '1'
        ]);
    }
}

