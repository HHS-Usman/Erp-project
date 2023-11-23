<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            
            $table->string('employee_code')->nullable();
            $table->string('employee_name');
            $table->string('father_name')->nullable();
            $table->string('cnic');
            $table->string('mobile_no');
            $table->string('family_code')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('familycontact')->nullable();
            $table->string('tele_no')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('maritalstatus')->nullable();
            $table->string('nationality')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('emergency_c_n')->nullable();
            $table->string('emergency_01')->nullable();
            $table->string('emergency_02')->nullable();
            $table->string('emergency_03')->nullable();
            $table->string('qualification')->nullable();
            $table->string('qualificationlevel')->nullable();
            $table->string('skill')->nullable();
            $table->string('skilllevel')->nullable();
            $table->boolean('emp_status')->default(true)->nullable();
            
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
        Schema::dropIfExists('employees');
    }
}
