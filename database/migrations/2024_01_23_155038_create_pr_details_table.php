<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // this command use drop table if exit pr_detail i was facing some issue then use it
        Schema::dropIfExists('pr_details');
        Schema::create('pr_details', function (Blueprint $table) {
            $table->integerIncrements("prdetail_id");
            $table->string("maxstock");
            $table->string("minstock");
            $table->string("uom")->nullable();
            $table->string("quantity")->nullable();
            $table->string("last_received_date")->nullable();
            $table->string("last_received_rate")->nullable();
            $table->string("product_description")->nullable();
            // forign key define here
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->unsignedBigInteger('pc_id')->nullable()->nullable();
            $table->foreign('pc_id')->references('id')->on('product_categories')->onDelete('cascade');

            $table->unsignedBigInteger('psubc_id')->nullable()->nullable();
            $table->foreign('psubc_id')->references('id')->on('product_sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('bs_id')->nullable()->nullable();
            $table->foreign('bs_id')->references('id')->on('brand_selections')->onDelete('cascade');

            $table->unsignedBigInteger('p_id')->nullable()->nullable();
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('pre_id')->nullable()->nullable();
            $table->foreign('pre_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');
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
        Schema::dropIfExists('pr_details');
    }
}
