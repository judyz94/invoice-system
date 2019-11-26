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
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->float('price');
            $table->integer('quantity');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices_products');
    }
}
