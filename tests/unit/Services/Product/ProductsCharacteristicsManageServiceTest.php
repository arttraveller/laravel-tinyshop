<?php

use App\Models\Brand;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Services\Product\ProductsAttributesManageService;
use Tests\unit\BaseUnit;

class ProductsAttributesManageServiceTest extends BaseUnit
{
    public function testSetValue()
    {
        $brand = $this->tester->have(Brand::class);
        $product = $this->tester->have(Product::class);
        $attribute = $this->tester->have(Attribute::class);

        (new ProductsAttributesManageService())->setValue($product->id, $attribute->id, '12345');

        $this->tester->seeRecord(ProductAttributeValue::class, [
            'product_id' => $product->id,
            'attribute_id' => $attribute->id,
        ]);
    }
}
