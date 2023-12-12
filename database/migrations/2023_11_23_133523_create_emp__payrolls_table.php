<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp__payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('costcenter')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bank_ac_no')->nullable();
            $table->string('company_bank')->nullable();
            $table->boolean('eobi_num')->default(true)->nullable();
            $table->string('eobi_no')->nullable();
            $table->boolean('pf_num')->default(true)->nullable();
            $table->string('pf_no')->nullable();
            $table->boolean('gratuity_num')->default(true)->nullable();
            $table->string('gratuity_no')->nullable();
            $table->string('pfstartdate')->nullable();
            $table->string('gratuitystartdate')->nullable();
            $table->string('overtime_rate_type')->nullable();
            $table->string('holiday_rate_type')->nullable();
            $table->string('shifthours')->nullable();
            $table->string('gazettedholidayrate')->nullable();
            $table->string('ratefactor')->nullable();
            $table->string('offday_ratefactor')->nullable();
            $table->string('workingday_ratefactor')->nullable();
            $table->string('offday_rate')->nullable();
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
        Schema::dropIfExists('emp__payrolls');
    }
}
