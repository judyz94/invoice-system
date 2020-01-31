<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePaymentAttempt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_attempts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_id');
            $table->string('process_url');
            $table->string('status');
            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_attempts');
    }
}
