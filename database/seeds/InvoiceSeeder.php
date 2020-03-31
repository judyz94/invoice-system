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
            'expedition_date' => '2019-12-19',
            'due_date' => '2020-06-30',
            'seller_id' => '1',
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
            'total_with_vat' => '1071000',
            'state_id' => '2',
            'user_id' => '1'
        ]);

        DB::table('invoices')->insert([
            'code' => 'A0026',
            'expedition_date' => '2020-03-19',
            'due_date' => '2020-06-20',
            'seller_id' => '2',
            'sale_description' => '5 pacas de cuido',
            'customer_id' => '1',
            'vat' => '0.19',
            'total' => '375000',
            'total_with_vat' => '446250',
            'state_id' => '1',
            'user_id' => '1'
        ]);

        DB::table('invoices')->insert([
            'code' => 'A0027',
            'expedition_date' => '2020-03-25',
            'due_date' => '2020-07-20',
            'seller_id' => '1',
            'sale_description' => '1 laptop marca Dell',
            'customer_id' => '2',
            'vat' => '0.19',
            'total' => '2400000',
            'total_with_vat' => '2856000',
            'state_id' => '4',
            'user_id' => '1'
        ]);

        DB::table('invoices')->insert([
            'code' => 'A0028',
            'expedition_date' => '2020-03-25',
            'due_date' => '2020-07-20',
            'seller_id' => '2',
            'sale_description' => '1 cama de perro',
            'customer_id' => '2',
            'vat' => '0.19',
            'total' => '120000',
            'total_with_vat' => '122800',
            'state_id' => '1',
            'user_id' => '1'
        ]);
    }
}

