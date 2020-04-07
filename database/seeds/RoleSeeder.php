<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'Admin',
            'special' => 'all-access'
        ]);

        DB::table('roles')->insert([
            'name' => 'Commercial advisor',
            'slug' => 'Advisor',
            'description' => 'Partial access'
        ]);

        DB::table('roles')->insert([
            'name' => 'Customer',
            'slug' => 'Customer',
            'description' => 'Pay'
        ]);
    }
}

