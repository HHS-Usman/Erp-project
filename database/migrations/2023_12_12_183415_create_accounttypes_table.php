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
            $table->string('description');
            $table->timestamps();
<<<<<<< HEAD

       
    });

=======
        });
>>>>>>> bead283df3b3f2110c26de05f59791b05d481d89
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

