<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnInvoiceIdInInvoicesProducts extends Migration
{
    public function up()
    {
        Schema::table('invoices_products', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('product_id');
        });
    }

    public function down()
    {
        Schema::table('invoices_products', function (Blueprint $table) {
            $table->dropColumn('invoice_id');
            $table->dropColumn('product_id');
        });
    }
}
