<?php

use App\Shop\Enums\EProductStatuses;
use App\Shop\Models\Brand;
use App\Shop\Models\Category;
use App\Shop\Models\Product;
use App\Shop\Services\ProductsManageService;
use Tests\unit\BaseUnit;

class ProductsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $productData = [
            'code' => '12345',
            'name' => 'New product',
            'description' => 'Text',
            'status' => EProductStatuses::ACTIVE,
            'main_category_id' => $category->id,
            'brand_id' => $brand->id,
            'old_price' => 2500.00,
            'price' => 999.99,
            'meta_title' => 'New product title',
            'meta_description' => 'New product description',
            'meta_keywords' => 'New product keywords',
        ];
        (new ProductsManageService())->create($productData);

        $product = Product::where($productData)->first();
        expect('created object', $product)->isInstanceOf(Product::class);
    }

}