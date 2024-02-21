<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity__transactions', function (Blueprint $table) {
            $table->bigIncrements('a_transaction_id');
            $table->unsignedBigInteger('p_action_id')->nullable();
            $table->foreign('p_action_id')->references('id')->on('page_actions')->onDelete('cascade');
            $table->unsignedBigInteger('doc_status_id');
            $table->foreign('doc_status_id')->references('id')->on('documentstatuses')->onDelete('cascade');
            $table->unsignedBigInteger('doc_type_id');
            $table->foreign('doc_type_id')->references('id')->on('documenttypes')->onDelete('cascade');
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('doc_no');
            $table->string('ip');
            $table->string('mac');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity__transactions');
    }
}
