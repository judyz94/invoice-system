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
        // 1
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'Admin',
            'description' => 'Total access',
            'special' => 'all-access'
        ]);

        // 2
        DB::table('roles')->insert([
            'name' => 'Commercial advisor',
            'slug' => 'Advisor',
            'description' => 'Partial access'
        ]);

        // 3
        DB::table('roles')->insert([
            'name' => 'Suspended',
            'slug' => 'Suspended',
            'description' => 'No access',
            'special' => 'no-access'
        ]);

        // 4
        DB::table('roles')->insert([
            'name' => 'Customer',
            'slug' => 'Customer',
            'description' => 'Pay'
        ]);
    }
}

