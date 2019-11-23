<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesProductsTable extends Migration
{
    public function up()
    {
        Schema::create('invoices_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('price');
            $table->integer('quantity');
            $table->timestampsTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices_products');
    }
}
