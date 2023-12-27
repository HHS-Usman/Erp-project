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
            $table->bigIncrements('suplier_id');
            $table->integer('customer_code');
            $table->string('email');
            $table->string('companyname');
            $table->string('phone_no1');
            $table->string('phone_no2');
            $table->string('address');
            $table->string('city'); #it is for forign key
            $table->string('cell_no');
            $table->string('province');#it is for forign key
            $table->string('contactperson');
            $table->integer('zipcode');
            $table->string('contactpersoncell_no');
            $table->string('country');#it is for forign key
            $table->string('contactperson_email');
            $table->string('supliertype'); #it is for forign key
            $table->string('supliercategory');#it is for category
            $table->integer('creditdays');
            $table->string('suplierdiscount');
            $table->string('creditlimit');
            $table->string('suplieradvance');
            $table->string('suplierlocality');
            $table->string('shipier_addres');
            $table->longText('shiping_city');
            $table->string('shippingprovince');#it is for forign key
            $table->string('shippingcountry');#it is for forign key
            $table->string('title');
            $table->string('contactpersonemail');
            $table->string('dispnote_invoice');
            $table->string('st_registration_no');
            $table->string('st_invoicenote');
            $table->string('withouttax_perc_age');
            $table->string('bankname');#it is for forign key
            $table->string('account_title');
            $table->bigInteger('accountno');
            $table->bigInteger('branchcode');
            $table->string('branchname');
            $table->float('openingbalance');
            $table->string('dateopening');
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
