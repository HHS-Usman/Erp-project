<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('branch_id')->nullable();
             $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('division');
            $table->string('division_code')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->string('status', 10)->nullable();
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
        Schema::dropIfExists('divisions');
    }
}
