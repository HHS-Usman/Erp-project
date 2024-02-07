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
            $table->integer('doc_ref_no');
            $table->string('date_picker');
            $table->text("pr_detail");
            $table->string("file");
            $table->integer("t_no_product");
            $table->integer("t_qty_product");
            // foreign key of Modetype
            $table->unsignedInteger("modet_id");
            $table->foreign("modet_id")->references("mt_id")->on("modetypes")->onDelete("cascade");
            // foreign key of department
            $table->unsignedBigInteger("depart_id");
            $table->foreign("depart_id")->references("id")->on("departments")->onDelete("cascade");
            // foreign key of employee
            $table->unsignedBigInteger("emp_id");
            $table->foreign("emp_id")->references("id")->on("employees")->onDelete("cascade");
            $table->unsignedBigInteger('doc_status')->default('1');
            $table->foreign('doc_status')->references('id')->on('documentstatuses')->onDelete('cascade');
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
