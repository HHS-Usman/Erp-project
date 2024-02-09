<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationComparitivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_comparitives', function (Blueprint $table) {
            $table->id();
            $table->string('appprove_vendor');
            $table->string('last_po_no');
            $table->string('pr_no');
            $table->string('department');
            $table->string('req_mode');
            $table->string('product_item');
            $table->string('uom');
            $table->string('qty');
            $table->string('pending_po');
            $table->string('description');
            $table->string('last_purchase_rate');
            $table->string('last_purchase_supplier');
            $table->string('last_purchase_remark');
            $table->string('appprove_po');
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
        Schema::dropIfExists('quotation_comparitives');
    }
}
