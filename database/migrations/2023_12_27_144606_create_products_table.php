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
            $table->string('product_code')->nullable();
            $table->string('name');
            $table->string('article_no')->nullable();
            $table->unsignedBigInteger('product_uom_id')->nullable();
            $table->foreign('product_uom_id')->references('id')->on('unit_selections')->onDelete('cascade');
            $table->string('product_description')->nullable();;
            $table->string('product_barcode')->nullable();
            $table->float('other_unit')->nullable();
            $table->unsignedBigInteger('other_uom_id')->nullable();
            $table->foreign('other_uom_id')->references('id')->on('unit_selections')->onDelete('cascade');
            $table->unsignedBigInteger('bulk_packing_id')->nullable();
            $table->foreign('bulk_packing_id')->references('id')->on('packing__types')->onDelete('cascade');
            $table->float('blk_pkg_flt')->nullable();
            $table->string('blk_pkg')->nullable();
            $table->string('batch_coding')->nullable();
            $table->string('batch_code')->nullable();
            $table->integer('btch_code')->default(0);
            $table->string('product_color')->nullable();
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('locality')->nullable();
            $table->float('reorder_type')->nullable();
            $table->float('min_qty')->nullable();
            $table->float('max_qty')->nullable();
            $table->unsignedBigInteger('stock_type_id')->nullable();
            $table->foreign('stock_type_id')->references('id')->on('stock__types')->onDelete('cascade');
            $table->unsignedBigInteger('product_activity_id')->nullable();
            $table->foreign('product_activity_id')->references('id')->on('product__activities')->onDelete('cascade');
            $table->unsignedBigInteger('warehousing_id')->nullable();
            $table->foreign('warehousing_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->string('expiry')->default('No')->nullable();
            $table->string('expiry_ap')->nullable();
            $table->string('expiry_n')->default('No')->nullable();
            $table->unsignedBigInteger('product_brand_id')->nullable();
            $table->foreign('product_brand_id')->references('id')->on('brand__selections')->onDelete('cascade');
            $table->unsignedBigInteger('product_classification_id')->nullable();
            $table->foreign('product_classification_id')->references('id')->on('classifications')->onDelete('cascade');
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->unsignedBigInteger('product_1stcategory_id')->nullable();
            $table->foreign('product_1stcategory_id')->references('id')->on('product_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('product_2ndcategory_id')->nullable();
            $table->foreign('product_2ndcategory_id')->references('id')->on('product_2nd_sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->foreign('product_type_id')->references('id')->on('product__types')->onDelete('cascade');
            $table->string('service')->default('No')->nullable();
            $table->string('fixedasset')->default('No')->nullable();
            $table->string('general_product')->default('No')->nullable();
            $table->string('product_active')->default('No')->nullable();
            $table->string('pqc_required')->default('No')->nullable();
            $table->unsignedBigInteger('product_supplier_id')->nullable();
            $table->foreign('product_supplier_id')->references('id')->on('product_suppliers')->onDelete('cascade');
            $table->string('product_image');
            $table->unsignedBigInteger('product_status_id')->nullable();
            $table->foreign('product_status_id')->references('id')->on('product__statuses')->onDelete('cascade');
            $table->float('price_per_unit')->nullable();
            $table->float('sale_price')->nullable();
            $table->float('float')->nullable();
            $table->float('float_value')->nullable();
            $table->string('product_value')->nullable();
            $table->float('product_profit')->nullable();
            $table->float('product_mrp')->nullable();
            $table->float('fur_itm_tax')->nullable();
            $table->float('fur_item_tax')->nullable();
            $table->string('calculation_type')->nullable();
            $table->string('applicable')->nullable();
            $table->string('itm_cost_method')->nullable();
            $table->string('direct_tax')->nullable();;
            $table->unsignedBigInteger('coa_id')->nullable();
            $table->foreign('coa_id')->references('id')->on('coas')->onDelete('cascade');
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
