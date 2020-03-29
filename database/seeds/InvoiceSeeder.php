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
            'due_date' => '2020-06-30',
            'seller_id' => '2',
            'sale_description' => '1 sofá y 2 pinturas',
            'customer_id' => '1',
            'vat' => '0.19',
            'total' => '380000',
            'total_with_vat' => '452200',
            'state_id' => '1',
            'user_id' => '1'
        ]);

        DB::table('invoices')->insert([
            'code' => 'A0025',
            'expedition_date' => '2020-11-19',
            'due_date' => '2020-02-20',
            'seller_id' => '1',
            'sale_description' => '1 celular',
            'customer_id' => '2',
            'vat' => '0.19',
            'total' => '900000',
            'total_with_vat' => '10710000',
            'state_id' => '2',
            'user_id' => '1'
        ]);

        DB::table('invoices')->insert([
            'code' => 'A0026',
            'expedition_date' => '2020-11-19',
            'due_date' => '2020-06-20',
            'seller_id' => '2',
            'sale_description' => '5 pacas de cuido',
            'customer_id' => '1',
            'vat' => '0.19',
            'total' => '375000',
            'total_with_vat' => '446250',
            'state_id' => '3',
            'user_id' => '1'
        ]);
    }
}

