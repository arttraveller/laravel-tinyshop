<?php

use App\Shop\Models\Brand;
use App\Shop\Models\Category;
use App\Shop\Models\Product;
use Tests\unit\BaseUnit;

class ProductTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);

        $product = $this->tester->have(Product::class);
        $productId = $product->id;
        $this->assertTrue($product->canDelete());
        $product->delete();
        $this->tester->dontSeeRecord(Product::class, ['id' => $productId]);
    }

}