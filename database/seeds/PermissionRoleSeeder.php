<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Customer - Invoice
        DB::table('permission_role')->insert([
            'permission_id' => '5',
            'role_id' => '3',
        ]);

        //Customer - Payment attempts
        DB::table('permission_role')->insert([
            'permission_id' => '10',
            'role_id' => '3',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '11',
            'role_id' => '3',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '12',
            'role_id' => '3',
        ]);

        //Customer - Modals warning
        DB::table('permission_role')->insert([
            'permission_id' => '40',
            'role_id' => '3',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '41',
            'role_id' => '3',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '42',
            'role_id' => '3',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '43',
            'role_id' => '3',
        ]);


        //Comercial advisor - Invoices
        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '2',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '3',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '5',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '6',
            'role_id' => '2',
        ]);

        //Comercial advisor - Details
        DB::table('permission_role')->insert([
            'permission_id' => '7',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '8',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '9',
            'role_id' => '2',
        ]);

        //Comercial advisor - Payment attempts
        DB::table('permission_role')->insert([
            'permission_id' => '10',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '11',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '12',
            'role_id' => '2',
        ]);

        //Comercial advisor - Products
        DB::table('permission_role')->insert([
            'permission_id' => '26',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '27',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '28',
            'role_id' => '2',
        ]);

        //Comercial advisor - Sellers
        DB::table('permission_role')->insert([
            'permission_id' => '30',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '31',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '32',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '34',
            'role_id' => '2',
        ]);

        //Comercial advisor - Customers
        DB::table('permission_role')->insert([
            'permission_id' => '35',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '36',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '37',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '39',
            'role_id' => '2',
        ]);

        //Comercial advisor - Modals warning
        DB::table('permission_role')->insert([
            'permission_id' => '40',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '41',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '42',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '43',
            'role_id' => '2',
        ]);
    }
}

