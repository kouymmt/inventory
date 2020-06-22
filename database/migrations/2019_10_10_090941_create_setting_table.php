<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('start_page');
            $table->integer('end_page');
            $table->integer('second_min');
            $table->integer('second_max');
            $table->integer('start_delay');
            $table->boolean('truncate_flg');
            $table->float('exchange_rate');
            $table->integer('mark_up_spread');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
