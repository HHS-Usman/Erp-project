<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->integerIncrements("pdetail_id");
            $table->string("sub_category");
            $table->string("UOM");
            $table->string("current_stock")->nullable();
            $table->string("qty_required")->nullable();
            $table->string("last_purchase")->nullable();
            $table->integer("min_stock");
            $table->integer("max_stock");
            $table->string("history")->nullable();
            $table->unsignedBigInteger('p_prequisition_id');
            $table->foreign('p_prequisition_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');
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
        Schema::dropIfExists('purchase_details');
    }
}
