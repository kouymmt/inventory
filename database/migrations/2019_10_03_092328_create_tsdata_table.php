<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsdata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');//0
            $table->string('ts_id');//45
            $table->string('ts_size');//5
            $table->integer('ts_base_price');//49
            $table->integer('ts_normal_price');//50
            $table->boolean('ts_inventory')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tsdata');
    }
}
