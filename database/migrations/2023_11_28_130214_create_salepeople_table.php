<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalepeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salepeople', function (Blueprint $table) {
            $table->id();
            $table->string('saleperson_code');
            $table->string('persontype')->nullable();
            $table->string('employee')->nullable();
            $table->string('detail')->nullable();
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
        Schema::dropIfExists('salepeople');
    }
}
