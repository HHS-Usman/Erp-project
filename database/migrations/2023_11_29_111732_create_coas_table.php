<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('coacode')->nullable();
            $table->string('coaname')->nullable();
            $table->boolean('operation')->default(true);
            $table->string('refaccode')->nullable();
            $table->integer('parentid')->nullable();
            $table->string('parentcoacode')->nullable();
            $table->string('coacategory')->nullable();
            $table->string('Level-1')->nullable();
            $table->string('Level-2')->nullable();
            $table->string('Level-3')->nullable();
            $table->string('Level-4')->nullable();
            $table->string('Level-5')->nullable();
            $table->string('Level-6')->nullable();
            $table->string('Level-7')->nullable();
            $table->string('accountype')->nullable();
            $table->string('openbalance')->nullable();
            $table->string('openingdate')->nullable();

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
        Schema::dropIfExists('coas');
    }
}
