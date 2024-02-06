<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColomnToPrDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pr_details', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_status')->default('1');
            $table->foreign('doc_status')->references('id')->on('documentstatuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pr_details', function (Blueprint $table) {
            //
        });
    }
}
