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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string("remarks");
            $table->string('document_no');
            $table->string('pr_no');
            $table->string('doc_no');
            $table->string('doc_no_l_d')->nullable();
            $table->string('voucher_no');
            $table->string('voucher_date');
            $table->integer('comparative_no');
            $table->unsignedBigInteger('company')->nullable();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('branch')->nullable();
            $table->foreign('branch')->references('id')->on('branches')->onDelete('cascade');
            $table->float('total_no_product')->nullable();
            $table->float('total_qty_product')->nullable();
            $table->float('total_tax_amount')->nullable();
            $table->float('total_discount_amount')->nullable();
            $table->float('gross_amount')->nullable();
            $table->float('net_amount')->nullable();
            $table->float('invoice_discount')->nullable();
            // department foreign key by Abrar
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments');
            // supplier foreign key by Abrar
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')->references('suplier_id')->on('suppliers')->onDelete('cascade');
            // doc status foreign key
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
        Schema::dropIfExists('quotations');
    }
}
