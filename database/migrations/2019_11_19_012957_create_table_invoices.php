<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvoices extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('code');
            $table->dateTimeTz('expedition_date');
            $table->dateTimeTz('due_date');
            $table->dateTimeTz('receipt_date');
            $table->mediumText('sale_description');
            $table->float('total');
            $table->float('vat')->default(0.19);
            $table->float('total_with_vat');
            $table->enum('status', ['sent','rejected','overdue','paid','cancelled']);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestampsTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
