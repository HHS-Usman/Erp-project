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
        Schema::dropIfExists('quotations');
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string("remarks");
            // branch foreign key
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // department foreign key
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            // supplier foreign key
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')->references('suplier_id')->on('suppliers')->onDelete('cascade');
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
