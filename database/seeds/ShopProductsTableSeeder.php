<?php

use App\Shop\Models\Product;
use Illuminate\Database\Seeder;

class ShopProductsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create();
    }

}
