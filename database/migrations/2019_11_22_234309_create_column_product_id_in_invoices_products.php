<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnProductIdInInvoicesProducts extends Migration
{
    public function up()
    {
        Schema::table('invoices_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('invoice_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('invoices_products', function (Blueprint $table) {
            $table->dropForeign('invoices_products_product_id_foreign');
        });
    }
}
