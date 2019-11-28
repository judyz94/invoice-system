<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSellers extends Migration
{
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 150);
            $table->bigInteger('document')->unique();
            $table->string('email', 40)->unique();
            $table->string('phone')->nullable();
            $table->string('address', 40)->nullable();
            $table->timestampsTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
