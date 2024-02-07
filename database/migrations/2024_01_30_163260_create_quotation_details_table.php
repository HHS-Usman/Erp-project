<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->id();
            $table->string('pr_no');
            $table->string('product_item');
            $table->string('product_wise_description')->nullable();
            $table->string('uom');
            $table->float('qty');
            $table->string('last_receivedate');
            $table->string('last_receive_rate');
            $table->float('rate');
            $table->float('tax');
            $table->float('tax_amount')->nullable();
            $table->float('amount');
            $table->float('discount');
            $table->float('discount_amount')->nullable();
            $table->boolean('appproval')->default(false);
            $table->unsignedBigInteger('quo_id')->nullable();
            $table->foreign('quo_id')->references('id')->on('quotations')->onDelete('cascade');
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
        Schema::dropIfExists('quotation_details');
    }
}
