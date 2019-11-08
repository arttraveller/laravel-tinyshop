<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Tests\unit\BaseUnit;

class BrandTest extends BaseUnit
{

    public function testDelete()
    {
        $brand = $this->tester->have(Brand::class);
        $brandId = $brand->id;
        expect('blank brand can be deleted', $brand->canDelete())->true();

        // Create product
        $category = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class, ['brand_id' => $brandId]);
        $brand->refresh();

        expect('brand that has products can not be deleted', $brand->canDelete())->false();
        $this->tester->expectThrowable(LogicException::class, function() use ($brand) {
            $brand->delete();
        });
    }

}
