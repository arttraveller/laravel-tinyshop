<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products_categories', function (Blueprint $table) {
            $table->bigInteger('product_id')->index();
            $table->bigInteger('category_id')->index();

            $table->primary(['product_id', 'category_id']);

            // FK
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('shop_categories')->onDelete('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products_categories');
    }

}
