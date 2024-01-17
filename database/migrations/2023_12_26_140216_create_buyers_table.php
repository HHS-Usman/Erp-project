<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->integerIncrements('buyer_id');
            $table->integer('customer_code')->nullable();
            $table->string('email')->nullable();
            $table->string('companyname')->nullable();
            $table->string('phone_no1')->nullable();
            $table->string('phone_no2')->nullable();
            $table->string('address')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('contactpersoncell_no')->nullable();
            $table->string('contactperson_email')->nullable();
            $table->integer('creditdays')->nullable();
            $table->string('buyerdiscount')->nullable();
            $table->string('creditlimit')->nullable();
            $table->string('buyeradvance')->nullable();
            $table->string('buyerlocality')->nullable();
            $table->string('shipping_addres')->nullable();
            $table->string('shipping_zip_code')->nullable();
            $table->string('title')->nullable();
            $table->string('contactpersonemail')->nullable();
            $table->string('cont_person')->nullable();
            $table->string('cont_person_no')->nullable();
            $table->string('dispnote_invoice')->nullable();
            $table->string('st_registration_no')->nullable();
            $table->string('st_invoicenote')->nullable();
            $table->string('withouttax_perc_age')->nullable();
            // $table->string('bankname')->nullable();#it is for forign key
            $table->string('account_title')->nullable();
            $table->bigInteger('accountno')->nullable();
            $table->bigInteger('branchcode')->nullable();
            $table->string('branchname')->nullable();
            $table->string('openingbalance')->nullable();
            $table->string('dateopening')->nullable();
            $table->timestamps();
           //Start For above condition data forign key
           $table->unsignedBigInteger('city_id');
           $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

           $table->unsignedBigInteger('province_id');
           $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');

           $table->unsignedBigInteger('country_id');
           $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
           //End 

           //start for other Condition supplier data forign key
           $table->unsignedBigInteger('shipping_city_id');
           $table->foreign('shipping_city_id')->references('id')->on('cities')->onDelete('cascade');

           $table->unsignedBigInteger('shipping_province_id');
           $table->foreign('shipping_province_id')->references('province_id')->on('provinces')->onDelete('cascade');

           $table->unsignedBigInteger('shipping_country_id');
           $table->foreign('shipping_country_id')->references('id')->on('countries')->onDelete('cascade');
           //END

            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('bank_id')->on('banks')->onDelete('cascade');

            $table->unsignedBigInteger('bcategory_id');
            $table->foreign('bcategory_id')->references('bcategory_id')->on('buyer_categories')->onDelete('cascade');

            $table->unsignedBigInteger('btype_id');
            $table->foreign('btype_id')->references('btype_id')->on('buyertypes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
