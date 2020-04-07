<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Invoices
        DB::table('permissions')->insert([
            'name' => 'Invoices index',
            'slug' => 'invoices.index',
            'description' => 'List all invoices'
        ]);

        DB::table('permissions')->insert([
            'name' => 'Invoices create',
            'slug' => 'invoices.create',
            'description' => 'Create invoices'
        ]);

        DB::table('permissions')->insert([
            'name' => 'Invoices edit',
            'slug' => 'invoices.edit',
            'description' => 'Edit invoices'
        ]);

        DB::table('permissions')->insert([
            'name' => 'Invoices delete',
            'slug' => 'invoices.destroy',
            'description' => 'Delete invoices'
        ]);

        DB::table('permissions')->insert([
        'name' => 'Invoices show',
        'slug' => 'invoices.show',
        'description' => 'Show invoice details'
        ]);

        DB::table('permissions')->insert([
            'name' => 'Invoices import',
            'slug' => 'invoices.import',
            'description' => 'Import invoices'
        ]);
    }
}

