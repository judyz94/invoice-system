<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'New',
        ]);

        DB::table('states')->insert([
            'name' => 'Overdue',
        ]);

        DB::table('states')->insert([
            'name' => 'Paid',
        ]);

        DB::table('states')->insert([
            'name' => 'Unpaid',
        ]);
    }
}

