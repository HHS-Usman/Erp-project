<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string("remarks");
            // branch forign key by abrar and nullable by badar
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // department foreign key
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('suplier_id')->on('suppliers')->onDelete('cascade')->collation('utf8_unicode_ci');
            $table->float("total_no_product");
            $table->float("total_qty_product");
            $table->float("total_taxamount");
            $table->float("total_discountamount");
            $table->float("grossamount");
            $table->float("netamount");
            $table->float("invoice_wise_discount");
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
        Schema::dropIfExists('quotations');
    }
}
