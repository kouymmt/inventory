<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ch_id');
            $table->integer('ch_base_price');
            $table->integer('ch_price');
            $table->string('ch_url');
            $table->integer('num');

            $table->boolean('error_flg')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_data');
    }
}
