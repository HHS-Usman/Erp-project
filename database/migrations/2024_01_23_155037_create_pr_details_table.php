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
            $table->bigIncrements('id');
            $table->string('max_stock')->nullable();
            $table->string('min_stock')->nullable();
            $table->string('uom')->nullable();
            $table->string('quantity')->nullable();
            $table->date('last_received_date')->nullable();
            $table->decimal('last_received_rate')->nullable();
            $table->text('product_description')->nullable();

            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->unsignedBigInteger('psubc_id')->nullable();
            $table->foreign('psubc_id')->references('id')->on('product_sub_categories')->onDelete('cascade');

            $table->unsignedBigInteger('bs_id')->nullable();
            $table->foreign('bs_id')->references('id')->on('brand_selections')->onDelete('cascade');

            $table->unsignedBigInteger('p_id')->nullable();
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade');

            // Ensure pre_id allows NULL values if optional
            $table->unsignedBigInteger('pre_id')->nullable();
            $table->foreign('pre_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');

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
