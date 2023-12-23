<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalvouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journalvouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('v_docNo');
            $table->integer('v_type');
            $table->string('memo');
            $table->string('doc_create_date');
            $table->string('jvdate');
            $table->int('debit_total');
            $table->int('credit_total');
            $table->timestamps();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journalvouchers');
    }
}
