<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductToCategory;
use App\Services\ProductsCategoriesManageService;
use Tests\unit\BaseUnit;

class ProductsCategoriesManageServiceTest extends BaseUnit
{

    public function testChangeMainCategory()
    {
        $brand = $this->tester->have(Brand::class);
        $category1 = $this->tester->have(Category::class);
        $category2 = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class, ['main_category_id' => $category1->id]);

        (new ProductsCategoriesManageService())->changeMainCategory($product, $category2->id);
        $this->tester->seeRecord(Product::class, [
            'id' => $product->id,
            'main_category_id' => $category2->id,
        ]);
    }



    public function testAssignAddiCategory()
    {
        $brand = $this->tester->have(Brand::class);
        $category1 = $this->tester->have(Category::class);
        $category2 = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class, ['main_category_id' => $category1->id]);

        (new ProductsCategoriesManageService())->assignAddiCategory($product, $category2->id);
        $this->tester->seeRecord(ProductToCategory::class, [
            'product_id' => $product->id,
            'category_id' => $category2->id,
        ]);
    }



    public function testRevokeAllAddiCategories()
    {
        $brand = $this->tester->have(Brand::class);
        $category1 = $this->tester->have(Category::class);
        $category2 = $this->tester->have(Category::class);
        $product1 = $this->tester->have(Product::class);
        $product2 = $this->tester->have(Product::class);
        $this->tester->haveRecord(ProductToCategory::class, ['product_id' => $product1->id, 'category_id' => $category1->id]);
        $this->tester->haveRecord(ProductToCategory::class, ['product_id' => $product2->id, 'category_id' => $category2->id]);


        (new ProductsCategoriesManageService())->revokeAllAddiCategories($product1);
        $this->tester->dontSeeRecord(ProductToCategory::class, ['product_id' => $product1->id]);
        // Did not affect other products?
        $this->tester->seeRecord(ProductToCategory::class, ['product_id' => $product2->id]);
    }

}
