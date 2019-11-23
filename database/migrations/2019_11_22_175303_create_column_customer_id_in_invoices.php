<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnCustomerIdInInvoices extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->after('sale_description');
            $table->foreign('customer_id')
                 ->references('id')->on('customers')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign('invoices_customer_id_foreign');
        });
    }
}
