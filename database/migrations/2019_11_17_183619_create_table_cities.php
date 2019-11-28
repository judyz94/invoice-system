<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCities extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 50);
            $table->timestampsTz();
    });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
