<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('code', 15)->nullable()->unique();
            $table->date('expedition_date');
            $table->date('due_date');
            $table->date('receipt_date');
            $table->text('sale_description');
            $table->double('total', 15, 2)->default(0);
            $table->double('vat', 15, 2)->default(0);
            $table->double('total_with_vat', 15, 2)->default(0);
            $table->enum('status', ['New','Sent','Overdue','Paid','Cancelled']);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

