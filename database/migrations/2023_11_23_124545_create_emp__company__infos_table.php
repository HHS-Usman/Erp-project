<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp__company__infos', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable();
            $table->string('branch')->nullable();
            $table->string('division')->nullable();
            $table->string('department')->nullable();
            $table->string('subdepartment')->nullable();
            $table->string('group')->nullable();
            $table->string('employeegrade')->nullable();
            $table->string('employeecategory')->nullable();
            $table->string('function')->nullable();
            $table->string('managementlevel')->nullable();
            $table->string('submanagementlevel')->nullable();
            $table->string('employeejobstatus')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('confirmation_date')->nullable();
            $table->string('retirement_date')->nullable();
            $table->string('contract_start_date')->nullable();
            $table->string('contract_end_date')->nullable();
            $table->string('resign_date')->nullable();
            $table->string('resign_acceptance_date')->nullable();
            $table->string('leaving_reason')->nullable();
            $table->string('leaving_date')->nullable();
            $table->string('approval_level')->nullable();
            $table->string('additionale_approval')->nullable();
            $table->string('approver')->nullable();
            $table->string('user_group')->nullable();
            $table->string('worklflow_group')->nullable();
           
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
        Schema::dropIfExists('emp__company__infos');
    }
}
