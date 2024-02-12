<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateATransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // this is activity Transaction
        Schema::create('a__transactions', function (Blueprint $table) {
            $table->integerIncrements('a_transaction_id');
            $table->unsignedInteger('p_action_id')->nullable();
            $table->foreign('p_action_id')->references('id')->on('page_actions')->onDelete('cascade');
            $table->unsignedBigInteger('doc_status_id');
            $table->foreign('doc_status_id')->references('id')->on('documentstatuses')->onDelete('cascade');
            $table->unsignedBigInteger('doc_type_id');
            $table->foreign('doc_type_id')->references('id')->on('documenttypes')->onDelete('cascade');
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->unsignedBigInteger('pr_id');
            $table->foreign('pr_id')->references('pr_id')->on('purchaserequisitions')->onDelete('cascade');
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
        Schema::dropIfExists('a__transactions');
    }
}
