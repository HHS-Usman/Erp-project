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
        Schema::create('pr_details', function (Blueprint $table) {
            $table->bigIncrements('pr_d_id');
            $table->unsignedBigInteger('pr_id')->nullable();
            $table->foreign('pr_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');
            $table->unsignedBigInteger('p_id')->nullable();
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade');
            $table->text('p_description')->nullable();
            $table->integer('order_qty')->nullable();
            $table->string('approve_qty')->nullable();
            $table->string('received_qty')->nullable();
            $table->string('pending_qty')->nullable();
            $table->integer('min_stock')->nullable();
            $table->integer('max_stock')->nullable();
            $table->string('uom')->nullable();
            // $table->unsignedBigInteger('p_main_cat_id')->nullable();
            // $table->foreign('p_main_cat_id')->references('id')->on('product_categories')->onDelete('cascade');   
            $table->unsignedBigInteger('p_subc_id')->nullable();
            $table->foreign('p_subc_id')->references('id')->on('product_sub_categories')->onDelete('cascade');   
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brand_selections')->onDelete('cascade');
            $table->decimal('last_received_rate')->nullable();
            $table->date('last_received_date')->nullable();
            $table->timestamps();
             // $table->unsignedBigInteger('branch_id')->nullable();
            // $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
