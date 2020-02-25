<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSellers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 150);
            $table->string('last_name', 150)->nullable();
            $table->string('full_name', 500);
            $table->enum('document_type', ['CC', 'TI', 'CE', 'RC', 'NIT', 'RUT']);
            $table->bigInteger('document')->unique();
            $table->string('email', 40)->unique();
            $table->string('phone')->nullable();
            $table->string('address', 40)->nullable();
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
        Schema::dropIfExists('sellers');
    }
}

