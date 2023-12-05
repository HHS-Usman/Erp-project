<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoamainheadlevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coamainheadlevels', function (Blueprint $table) {
            $table->id();
            $table->string('headname');
            $table->string('account_code')->nullable();
            $table->string('transctiontype')->nullable();
            $table->string('accountcategory')->nullable();
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
        Schema::dropIfExists('coamainheadlevels');
    }
}
