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
            $table->integer('accountcode')->nullable();
            $table->string('accountname')->nullable();
            $table->boolean('operation')->default(true)->require();
            $table->integer('parentid')->nullable();
            $table->string('parentcoa')->nullable();
            $table->string('accountcategory')->nullable();
            $table->string('Level-1')->nullable();
            $table->string('Level-2')->nullable();
            $table->string('Level-3')->nullable();
            $table->string('Level-4')->nullable();
            $table->string('Level-5')->nullable();
            $table->string('Level-6')->nullable();
            $table->string('Level-7')->nullable();
            $table->string('refaccode')->nullable();
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
