<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::dropIfExists('quotations');
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string("remarks");
            $table->string('prs');
            $table->float('total_no_product')->nullable();
            $table->float('total_qty_product')->nullable();
            $table->float('total_tax_amount')->nullable();
            $table->float('total_discount_amount')->nullable();
            $table->float('gross_amount')->nullable();
            $table->float('net_amount')->nullable();
            $table->float('invoice_discount')->nullable();
            // branch foreign key by Abrar
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            // department foreign key by Abrar
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments');
            // supplier foreign key by Abrar
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')->references('suplier_id')->on('suppliers');
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
