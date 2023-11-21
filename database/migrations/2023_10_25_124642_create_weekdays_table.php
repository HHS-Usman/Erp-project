<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekdays', function (Blueprint $table) {
            $table->id();
            $table->boolean('sel_sun_01')->default(true)->nullable();
            $table->boolean('1stweek_sun_01')->default(true)->nullable();
            $table->boolean('2ndweek_sun_01')->default(true)->nullable();
            $table->boolean('3rdweek_sun_01')->default(true)->nullable();
            $table->boolean('4thweek_sun_01')->default(true)->nullable();
            $table->boolean('sel_mon_02')->default(true)->nullable();
            $table->boolean('1stweek_mon_02')->default(true)->nullable();
            $table->boolean('2ndweek_mon_02')->default(true)->nullable();
            $table->boolean('3rdweek_mon_02')->default(true)->nullable();
            $table->boolean('4thweek_mon_02')->default(true)->nullable();
            $table->boolean('sel_tue_03')->default(true)->nullable();
            $table->boolean('1stweek_tue_03')->default(true)->nullable();
            $table->boolean('2ndweek_tue_03')->default(true)->nullable();
            $table->boolean('3rdweek_tue_03')->default(true)->nullable();
            $table->boolean('4thweek_tue_03')->default(true)->nullable();
            $table->boolean('sel_wed_04')->default(true)->nullable();
            $table->boolean('1stweek_wed_04')->default(true)->nullable();
            $table->boolean('2ndweek_wed_04')->default(true)->nullable();
            $table->boolean('3rdweek_wed_04')->default(true)->nullable();
            $table->boolean('4thweek_wed_04')->default(true)->nullable();
            $table->boolean('sel_thu_05')->default(true)->nullable();
            $table->boolean('1stweek_thu_05')->default(true)->nullable();
            $table->boolean('2ndweek_thu_05')->default(true)->nullable();
            $table->boolean('3rdweek_thu_05')->default(true)->nullable();
            $table->boolean('4thweek_thu_05')->default(true)->nullable();
            $table->boolean('sel_fri_06')->default(true)->nullable();
            $table->boolean('1stweek_fri_06')->default(true)->nullable();
            $table->boolean('2ndweek_fri_06')->default(true)->nullable();
            $table->boolean('3rdweek_fri_06')->default(true)->nullable();
            $table->boolean('4thweek_fri_06')->default(true)->nullable();
            $table->boolean('sel_sat_07')->default(true)->nullable();
            $table->boolean('1stweek_sat_07')->default(true)->nullable();
            $table->boolean('2ndweek_sat_07')->default(true)->nullable();
            $table->boolean('3rdweek_sat_07')->default(true)->nullable();
            $table->boolean('4thweek_sat_07')->default(true)->nullable();
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
        Schema::dropIfExists('weekdays');
    }
}
