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
<<<<<<< HEAD:database/migrations/2023_12_12_183415_create_accounttypes_table.php
        Schema::create('accounttypes', function (Blueprint $table) {
            $table->id();
            $table->string('typeaccount')->nullable();
            $table->string('Description');
            $table->dropColumn('description');
            $table->timestamps();
=======
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('branchID')->nullable();
            $table->foreign('branchID')->references('id')->on('branches')->onDelete('cascade');
>>>>>>> 5889b5bcd81dd92cff08578e5f8b4b42a301cfc7:database/migrations/2023_10_23_094153_add_branch_id_to_users.php
        });
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
