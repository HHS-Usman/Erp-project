<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('suplier_id')->nullable();
            $table->integer('customer_code')->nullable();
            $table->string('email')->nullable();
            $table->string('companyname')->nullable();
            $table->string('phone_no1')->nullable();
            $table->string('phone_no2')->nullable();
            $table->string('address')->nullable();
            // $table->string('city')->nullable(); #it is for forign key
            $table->string('cell_no')->nullable();
            // $table->string('province')->nullable();#it is for forign key
            $table->string('contactperson')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('contactpersoncell_no')->nullable();
            // $table->string('country')->nullable();#it is for forign key
            $table->string('contactperson_email')->nullable();
            // $table->string('supliertype')->nullable(); #it is for forign key
            // $table->string('supliercategory')->nullable();#it is for category
            $table->integer('creditdays')->nullable();
            $table->string('suplierdiscount')->nullable();
            $table->string('creditlimit')->nullable();
            $table->string('suplieradvance')->nullable();
            $table->string('suplierlocality')->nullable();
            $table->string('shipier_addres')->nullable();
            $table->longText('shiping_city')->nullable();
            // $table->string('shippingprovince')->nullable();#it is for forign key
            // $table->string('shippingcountry')->nullable();#it is for forign key
            $table->string('title')->nullable();
            $table->string('contactpersonemail')->nullable();
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
            // Now use forign Key
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('bank_id')->on('banks')->onDelete('cascade');

            $table->unsignedBigInteger('suplierCatg_id');
            $table->foreign('suplierCatg_id')->references('supliercatg_id')->on('supplier_categories')->onDelete('cascade');

            $table->unsignedBigInteger('supliertype_id');
            $table->foreign('supliertype_id')->references('stype_id')->on('suppliertypes')->onDelete('cascade');

            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('province_id')->on('provinces')->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->unsignedBigInteger('City_id');
            $table->foreign('City_id')->references('id')->on('cities')->onDelete('cascade');

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
        Schema::dropIfExists('suppliers');
    }
}
