<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaserequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaserequisitions', function (Blueprint $table) {
            $table->bigIncrements("purchase_id");
            $table->integer('doc_ref_no');
            $table->string('model_type');
            $table->string('date_picker');
            $table->text("pr_detail");
            $table->string("file");
        
            // foreign key of department 
            $table->unsignedBigInteger("depart_id");
            $table->foreign("depart_id")->references("id")->on("departments")->onDelete("cascade");
            // foreign key of employee 
            $table->unsignedBigInteger("emp_id");
            $table->foreign("emp_id")->references("id")->on("employees")->onDelete("cascade");

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
        Schema::dropIfExists('purchaserequisitions');
    }
}
