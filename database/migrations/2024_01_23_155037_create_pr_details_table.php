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
        // Abrar ul Hassan Puchase Requisition Schema
        Schema::create('pr_details', function (Blueprint $table) {
            $table->bigIncrements('pr_d_id');
            $table->unsignedBigInteger('pr_id');
            $table->foreign('pr_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');
            $table->unsignedBigInteger('p_id');
            $table->foreign('p_id')->references('id')->on('products')->onDelete('cascade');
            $table->text('p_description')->nullable();
            $table->float('req_qty');
            $table->float('approve_qty_for_quotation');
            $table->float('receive_qty_for_quotation');
            $table->float('pending_qty_for_quotation');
            $table->float('approve_qty_for_po');
            $table->float('receive_qty_for_po');
            $table->float('pending_qty_for_po');
            $table->float('approved_qty_for_direct_inv');
            $table->float('receive_qty_for_direct_inv');
            $table->float('pending_qty_for_direct_inv');
            $table->float('req_min_stock');
            $table->float('req_max_stock');
            $table->string('uom');
            $table->unsignedBigInteger('p_main_cat');
            $table->foreign('p_main_cat')->references('id')->on('product_categories')->onDelete('cascade');  
            $table->unsignedBigInteger('p_subc_cat');
            $table->foreign('p_subc_cat')->references('id')->on('product_sub_categories')->onDelete('cascade');   
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand_selections')->onDelete('cascade');
            $table->float('last_received_rate')->nullable();
            $table->date('last_received_date')->nullable();
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
