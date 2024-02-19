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
            $table->string('doc_ref_no')->nullable();
            $table->unsignedInteger('mode_type_id');
            $table->foreign('mode_type_id')->references('mt_id')->on('modetypes')->onDelete('cascade');
            $table->date('pr_req_date');
            $table->date('pr_doc_date');
            $table->text('remarks')->nullable();
            $table->float('t_no_product');
            $table->float('t_qty_product');
            $table->text('attachment')->nullable();
            $table->unsignedBigInteger('req_by_br_id')->nullable();
            $table->foreign('req_by_br_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedInteger('req_by_location_id')->nullable();
            $table->foreign('req_by_location_id')->references('location_id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('req_by_depart_id')->nullable();
            $table->foreign('req_by_depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('req_by_emp_id')->nullable();
            $table->foreign('req_by_emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('doc_status'); 
            $table->foreign('doc_status')->references('id')->on('documentstatuses')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->boolean('quotation_required');
            $table->boolean('direct_po_required');
            $table->boolean('direct_purchase_required');

            $table->string('useless_create')->nullable();
            $table->timestamp('useless_update')->nullable();

            $table->unsignedBigInteger('draft_by')->nullable();
            $table->foreign('draft_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('create_by');
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('update_by')->nullable();
            $table->foreign('update_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('approve_by')->nullable();
            $table->foreign('approve_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('delete_by')->nullable();
            $table->foreign('delete_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('return_by')->nullable();
            $table->foreign('return_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('complete_by')->nullable();
            $table->foreign('complete_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('close_by')->nullable();
            $table->foreign('close_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->date('draft_at')->nullable();
            $table->date('approve_at')->nullable();
            $table->date('delete_at')->nullable();
            $table->date('return_at')->nullable();
            $table->date('complete_at')->nullable();
            $table->date('close_at')->nullable();
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
