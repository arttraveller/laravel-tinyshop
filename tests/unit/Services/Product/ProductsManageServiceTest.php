<?php

use App\Enums\EProductStatuses;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Tests\unit\BaseUnit;

class ProductsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $existTag = $this->tester->have(Tag::class);
        $productData = [
            'code' => '12345',
            'name' => 'New product',
            'description' => 'Text',
            'status' => EProductStatuses::ACTIVE,
            'brand_id' => $brand->id,
            'old_price' => 2500.00,
            'price' => 999.99,

            'categories' => [
                $category->id,
            ],
            'exist_tags' => [
                $existTag->id
            ],

            'meta_title' => 'New product title',
            'meta_description' => 'New product description',
            'meta_keywords' => 'New product keywords',
        ];
        $service = app()->make('App\Services\Product\ProductsManageService');
        $service->create($productData);

        $product = Product::where(['code' => $productData['code']])->first();
        expect('created object', $product)->isInstanceOf(Product::class);
    }

}
