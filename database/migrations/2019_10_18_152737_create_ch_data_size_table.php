<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChDataSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ch_data_size', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ch_id')->index();
            $table->string('ch_size');
        });
    }

    /**:refresh
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ch_data_size');
    }
}
