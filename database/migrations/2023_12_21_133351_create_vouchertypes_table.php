<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchertypes', function (Blueprint $table) {
            $table->integer("vouchertype_id");
            $table->string('vouchertitle');
            $table->string('voucherprefix');
            $table->string('vouchertype');
            $table->string('transactiontype');
            $table->timestamps();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->unsignedBigInteger('coa_id');
            $table->foreign('coa_id')->references('id')->on('coas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchertypes');
    }
}
