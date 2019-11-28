<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 150);
            $table->timestampsTz();
        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

