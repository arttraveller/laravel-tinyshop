<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products_to_tags', function (Blueprint $table) {
            $table->bigInteger('product_id')->index();
            $table->bigInteger('tag_id')->index();

            $table->primary(['product_id', 'tag_id']);

            // FK
            $table->foreign('product_id')->references('id')->on('shop_products')->onDelete('CASCADE');
            $table->foreign('tag_id')->references('id')->on('shop_tags')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products_to_tags');
    }
}
