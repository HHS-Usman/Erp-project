<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaserequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Abrar ul Hassan
        Schema::create('purchaserequisitions', function (Blueprint $table) {
            $table->bigIncrements('pr_id');
            $table->string('pr_doc_no');
            $table->integer('doc_ref_no');
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedInteger('modetype_id');
            $table->foreign('modetype_id')->references('mt_id')->on('modetypes')->onDelete('cascade');
            $table->date('required_date');
            $table->date('doc_create_date');
            $table->text('pr_remarks');
            $table->integer('t_no_product');
            $table->integer('t_qty_product');
            $table->string('attachment');
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('doc_status')->default(1);
            $table->foreign('doc_status')->references('id')->on('documentstatuses')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('action')->nullable();
            $table->foreign('action')->references('id')->on('page_actions')->onDelete('cascade');
            $table->string('useless_create')->nullable();
            $table->timestamp('useless_update')->nullable();
            $table->unsignedBigInteger('approve_emp_id')->nullable();
            $table->foreign('approve_emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamp('approve_datetime')->nullable();
            $table->boolean('quotation_required')->default(true)->nullable();
            $table->boolean('po')->default(true)->nullable();
            $table->unsignedBigInteger('delete_emp_id')->nullable();
            $table->foreign('delete_emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamp('delete_datetime')->nullable();
            $table->unsignedBigInteger('create_emp_id')->nullable();
            $table->foreign('create_emp_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('update_emp_id')->nullable();
            $table->foreign('update_emp_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('purchaserequisitions');
    }
}
