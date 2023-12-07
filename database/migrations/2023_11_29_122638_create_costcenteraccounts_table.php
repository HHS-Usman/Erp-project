<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostcenteraccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costcenteraccounts', function (Blueprint $table) {
            $table->id('costcenter_id');
            $table->integer('costcenter_code');
            $table->string('costcentername');
            $table->boolean('operation')->default(true);
            $table->integer('parentid');
            $table->integer('parentcode');
            $table->string('Level-1')->nullable();
            $table->string('Level-2')->nullable();
            $table->string('Level-3')->nullable();
            $table->string('Level-4')->nullable();
            $table->string('Level-5')->nullable();
            $table->string('Level-6')->nullable();
            $table->string('Level-7')->nullable();
            $table->integer('costcentertype')->nullable();
            $table->string('costcentermapping');
            $table->boolean('is_active')->default(true)->nullable();


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
        Schema::dropIfExists('costcenteraccounts');
    }
}
