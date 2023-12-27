<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_closings', function (Blueprint $table) {
            $table->bigIncrements('yclosing_id');
            $table->string('clsoingyear');
            $table->string('description');
            $table->unsignedBigInteger('coa_id');
            $table->foreign('coa_id')->references('id')->on('coas');
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
        Schema::dropIfExists('year_closings');
    }
}
