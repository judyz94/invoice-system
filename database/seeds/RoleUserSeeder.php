<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin = Judy
        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);

        //Advisor = Yuliana
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '2',
        ]);

        //Advisor = Pedro Nel
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '3',
        ]);

        //Customer = Maria
        DB::table('role_user')->insert([
            'role_id' => '4',
            'user_id' => '4',
        ]);

        //Suspended = Roberto
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '5',
        ]);
    }
}

