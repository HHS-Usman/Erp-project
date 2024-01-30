<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_selections', function (Blueprint $table) {
            $table->id();
            $table->string('brand_selection');
            $table->string('brand_selection_code');
            $table->string('detail');
            $table->boolean('is_active')->default(true)->nullable();
            // forign key of product sub category by Abrar ul Hassan
            $table->unsignedBigInteger('psubc_id');
            $table->foreign('psubc_id')->references('id')->on('product_sub_categories');

            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
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
        Schema::dropIfExists('brand_selections');
    }
}
