<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsAttributesValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products_attributes_values', function (Blueprint $table) {
            $table->bigInteger('product_id')->index();
            $table->bigInteger('attribute_id')->index();
            $table->string('value');

            $table->primary(['product_id', 'attribute_id']);

            // FK
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->foreign('attribute_id')->references('id')->on('shop_attributes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products_attributes_values');
    }
}
