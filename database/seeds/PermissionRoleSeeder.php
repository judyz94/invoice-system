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
            'permission_id' => '21',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '22',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '23',
            'role_id' => '2',
        ]);

        //Comercial advisor - Sellers
        DB::table('permission_role')->insert([
            'permission_id' => '25',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '26',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '27',
            'role_id' => '2',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '29',
            'role_id' => '2',
        ]);

        //Comercial advisor - Customers
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

        //Comercial advisor - Modals warning
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
            'permission_id' => '38',
            'role_id' => '2',
        ]);


        //Customer - Invoices
        DB::table('permission_role')->insert([
            'permission_id' => '43',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '5',
            'role_id' => '4',
        ]);

        //Customer - Payment attempts
        DB::table('permission_role')->insert([
            'permission_id' => '10',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '11',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '12',
            'role_id' => '4',
        ]);

        //Customer - Modals warning
        DB::table('permission_role')->insert([
            'permission_id' => '35',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '36',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '37',
            'role_id' => '4',
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '38',
            'role_id' => '4',
        ]);

        //Customer - Home
        /*DB::table('permission_role')->insert([
            'permission_id' => '43',
            'role_id' => '4',
        ]);*/
    }
}

