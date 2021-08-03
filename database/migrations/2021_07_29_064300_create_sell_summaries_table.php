<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_summaries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('employee');
            $table->dateTime('created_date');
            $table->dateTime('last_update');
            $table->bigInteger('price_total');
            $table->bigInteger('discount_total');
            $table->bigInteger('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_summaries');
    }
}
