<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGivePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('give_permits', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('role');
            $table->string('module');
            $table->string('page');
            $table->string('company_name');
            $table->string('access');
            $table->string('password');
            $table->string('report_access');
            $table->string('back_date_entry');
            $table->string('post_date_entry');
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
        Schema::dropIfExists('give_permits');
    }
}
