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
            $table->date('expedition_date');
            $table->date('due_date');
            $table->date('receipt_date');
            $table->text('sale_description');
            $table->float('total')->nullable();
            $table->float('vat');
            $table->float('total_with_vat')->nullable();
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
