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
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('costcenter_code')->nullable();
            $table->string('costcentername');
            $table->boolean('operation')->default(true);
            $table->integer('parentid');
            $table->string('parentcode');
            $table->string('Level-1')->nullable();
            $table->string('Level-2')->nullable();
            $table->string('Level-3')->nullable();
            $table->string('Level-4')->nullable();
            $table->string('Level-5')->nullable();
            $table->string('Level-6')->nullable();
            $table->string('Level-7')->nullable();
            $table->string('costcentertype')->nullable();
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
