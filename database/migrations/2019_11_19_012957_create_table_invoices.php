<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvoices extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('expedition_date');
            $table->dateTime('due_date');
            $table->dateTime('receipt_date');
            $table->mediumText('sale_description');
            $table->float('total');
            $table->float('vat')->default(0.19);
            $table->float('total_including_vat');
            $table->enum('status', ['sent','rejected','overdue','paid','cancelled']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
