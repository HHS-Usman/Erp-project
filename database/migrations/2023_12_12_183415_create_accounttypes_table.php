<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccounttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounttypes', function (Blueprint $table) {
            $table->id();
            $table->string('typeaccount')->nullable();
            $table->string('Description');
            $table->dropColumn('description');
            $table->timestamps();
<<<<<<< HEAD
        });
=======
       
    });
>>>>>>> cbd93b031934b3f51d3c208a18c8b9791a8aa3a5
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounttypes');
    }
}

