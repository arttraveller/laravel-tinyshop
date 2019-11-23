<?php

use App\Enums\EProductStatuses;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductToCategory;
use App\Models\ProductToTag;
use App\Models\Tag;
use Tests\unit\BaseUnit;

class ProductsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $productData = $this->getValidData();
        $service = app()->make('App\Services\Product\ProductsManageService');
        $service->create($productData);

        $product = Product::where([
            'code' => $productData['code'],
            'name' => $productData['name'],
            'description' => $productData['description'],
            'status' => $productData['status'],
            'brand_id' => $productData['brand_id'],
            'old_price' => $productData['old_price'],
            'price' => $productData['price'],
            'meta_title' => $productData['meta_title'],
            'meta_description' => $productData['meta_description'],
            'meta_keywords' => $productData['meta_keywords'],
        ])->first();
        expect('created object', $product)->isInstanceOf(Product::class);

        // Check categories
        $this->tester->seeRecord(ProductToCategory::class, [
            'product_id' => $product->id,
            'category_id' => array_shift($productData['categories']),
        ]);

        // Check tags
        $this->tester->seeRecord(ProductToTag::class, [
            'product_id' => $product->id,
            'tag_id' => array_shift($productData['exist_tags']),
        ]);

    }


    public function testSuccessfulUpdate()
    {
        $brand = $this->tester->have(Brand::class);
        $oldProduct = $this->tester->haveRecord(Product::class, [
            'code' => 'old-product',
            'name' => 'Old product',
            'status' => EProductStatuses::DRAFT,
            'brand_id' => $brand->id,
            'price' => 999.99
        ]);

        $newCategory = $this->tester->have(Category::class);
        $newTag = $this->tester->have(Tag::class);
        $newProductData = [
            'code' => $oldProduct->code,
            'name' => 'Updated old product',
            'description' => 'Text',
            'status' => EProductStatuses::ACTIVE,
            'brand_id' => $brand->id,
            'old_price' => $oldProduct->price,
            'price' => 888.88,

            'categories' => [
                $newCategory->id,
            ],
            'exist_tags' => [
                $newTag->id
            ],
        ];

        $service = app()->make('App\Services\Product\ProductsManageService');
        $newProduct = $service->update($oldProduct, $newProductData);

        // Check product
        $this->tester->seeRecord(Product::class, [
            'id' => $oldProduct->id,
            'name' => $newProductData['name'],
            'description' => $newProductData['description'],
            'status' => $newProductData['status'],
            'price' => $newProductData['price'],
        ]);

        // Check categories
        $newProductCategories = $newProduct->categories->all();
        expect('Correct num categories', count($newProductCategories))->equals(1);
        expect('New category assigned', (array_shift($newProductCategories)->id === $newCategory->id))->true();

        // Check tags
        $newProductTags = $newProduct->tags->all();
        expect('Correct num tags', count($newProductTags))->equals(1);
        expect('New tags assigned', (array_shift($newProductTags)->id === $newTag->id))->true();
    }


    private function getValidData(): array
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $existTag = $this->tester->have(Tag::class);
        return [
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
    }

}
