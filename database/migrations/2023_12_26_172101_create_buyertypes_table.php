<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyertypes', function (Blueprint $table) {
            $table->bigIncrements('btype_id');
            $table->string('buyertype');
            $table->string('buyertype_code');
            $table->string('detail');
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
        Schema::dropIfExists('buyertypes');
    }
}
