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
        Schema::create('purchaserequisitions', function (Blueprint $table) {
            $table->bigIncrements("pr_id");
            $table->string('pr_doc_no');
            $table->integer('doc_ref_no');
            // foreign key of department
            $table->unsignedBigInteger("depart_id");
            $table->foreign("depart_id")->references("id")->on("departments")->onDelete("cascade");
            // foreign key of Modetype
            $table->unsignedInteger("modetype_id");
            $table->foreign("modetype_id")->references("mt_id")->on("modetypes")->onDelete("cascade");

            $table->string('required_date');
            $table->string('doc_create_date');
            $table->text("pr_remarks");
            $table->integer("t_no_product");
            $table->integer("t_qty_product");
            $table->string("attachement");
            // foreign key of employee
            $table->unsignedBigInteger("emp_id");
            $table->foreign("emp_id")->references("id")->on("employees")->onDelete("cascade");
            // foreign key of branch
            $table->unsignedBigInteger("branch_id")->nullable();
            $table->foreign("branch_id")->references("id")->on("branches")->onDelete("cascade");
            // foreign key of location
            $table->unsignedInteger("location_id")->nullable();;
            $table->foreign("location_id")->references("location_id")->on("locations")->onDelete("cascade");
            // foreign key of doc status id
            $table->unsignedBigInteger('doc_status')->default('1')->nullable();
            $table->foreign('doc_status')->references('id')->on('documentstatuses')->onDelete('cascade');

            $table->boolean('active')->default(true)->nullable();
            // foreign key of page action
            $table->unsignedBigInteger("action")->nullable();
            $table->foreign("action")->references("id")->on("page_actions")->onDelete("cascade");
            // foreign key of Employe getting from session login with system
            $table->unsignedBigInteger("create_emp_id")->nullable();
            $table->foreign("create_emp_id")->references("id")->on("employees")->onDelete("cascade");
            $table->timestamp('created_at')->useCurrent();
            // foreign key of Employe update 
            $table->unsignedBigInteger("update_emp_id")->nullable();
            $table->foreign("update_emp_id")->references("id")->on("employees")->onDelete("cascade");
            $table->string('update_datetime')->nullable();
            // foreign key of Employe approve employe id
            $table->unsignedBigInteger("approve_emp_id")->nullable();
            $table->foreign("approve_emp_id")->references("id")->on("employees")->onDelete("cascade");
            $table->string('approve_datetime')->nullable();
            // foreign key of Employe Delete employe id
            $table->unsignedBigInteger("delete_emp_id")->nullable();
            $table->foreign("delete_emp_id")->references("id")->on("employees")->onDelete("cascade");
            $table->string('delete_datetime')->nullable();

            $table->boolean('quotation_required')->default(true)->nullable();
            $table->boolean('po')->default(true)->nullable();
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
