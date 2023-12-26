<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('product_code');
            $table->string('name');
            $table->string('article_no');
            $table->string('product_uom');
            $table->string('product_description');
            $table->string('product_barcode');
            $table->string('other_uom');
            $table->float('other_Unit');
            $table->string('Bulk_Packing');
            $table->string('Batch_coding');
            $table->string('product_color');
            $table->string('origin');
            $table->string('locality');
            $table->float('reorder_type');
            $table->float('min_qty');
            $table->float('max_qty');
            $table->string('stock_type');
            $table->string('product_activity');
            $table->string('warehousing');
            $table->boolean('expiry')->default('No')->nullable();
            $table->string('expiry_ap');
            $table->string('product_brand');
            $table->string('product_classification');
            $table->string('product_category');
            $table->string('product_1stcategory');            
            $table->string('product_2ndcategory');            
            $table->string('product_type');   
            $table->boolean('service')->default('No')->nullable();
            $table->boolean('fixedasset')->default('No')->nullable();
            $table->string('product_status');
            $table->boolean('pqc_required')->default('No')->nullable();
            $table->string('product_supplier');
            $table->string('product_image'); 
            $table->string('product_status');
            $table->float('price_per_unit');
            $table->float('dis_percentage');
            $table->float('dis_value');
            $table->float('dis_afterdis');
            $table->float('sale_price');
            $table->float('float');          
            $table->float('float_value');
            $table->string('product_value');
            $table->float('product_profit');
            $table->float('product_mrp');
            $table->float('fur_itm_tax');
            $table->float('fur_item_tax');
            $table->string('calculation_type');
            $table->string('itm_cost_method');
            $table->string('direct_tax');
            $table->string('coa');
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
        Schema::dropIfExists('products');
    }
}
