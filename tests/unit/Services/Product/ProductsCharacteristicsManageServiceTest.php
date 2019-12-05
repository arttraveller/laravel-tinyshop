<?php

use App\Models\Brand;
use App\Models\Characteristic;
use App\Models\Product;
use App\Models\ProductCharacteristicValue;
use App\Services\Product\ProductsCharacteristicsManageService;
use Tests\unit\BaseUnit;

class ProductsCharacteristicsManageServiceTest extends BaseUnit
{
    public function testSetValue()
    {
        $brand = $this->tester->have(Brand::class);
        $product = $this->tester->have(Product::class);
        $characteristic = $this->tester->have(Characteristic::class);

        (new ProductsCharacteristicsManageService())->setValue($product->id, $characteristic->id, '12345');

        $this->tester->seeRecord(ProductCharacteristicValue::class, [
            'product_id' => $product->id,
            'characteristic_id' => $characteristic->id,
        ]);
    }
}
