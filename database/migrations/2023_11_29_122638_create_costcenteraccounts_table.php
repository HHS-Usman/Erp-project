<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

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
            $table->id();
            $table->string('costcenter_code')->nullable();
            $table->string('costcentername');
            $table->boolean('operational')->default(true);
            $table->integer('parentid');
            $table->string('parentcode');
            $table->integer('Level-1')->nullable();
            $table->integer('Level-2')->nullable();
            $table->integer('Level-3')->nullable();
            $table->integer('Level-4')->nullable();
            $table->integer('Level-5')->nullable();
            $table->integer('Level-6')->nullable();
            $table->integer('Level-7')->nullable();
            $table->string('costcentertype')->nullable();
            // $table->string('costcentermapping');
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments');
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
