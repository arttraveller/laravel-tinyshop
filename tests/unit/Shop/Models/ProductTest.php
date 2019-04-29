<?php

use App\Shop\Enums\EProductStatuses;
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


    public function testSetPrice()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class);

        $product->setPrice(99.98765, 160);
        expect('product price is correct', $product->price)->equals(99.99);
        expect('product old_price is correct', $product->old_price)->equals(160.00);
    }



    public function testSetNewStatusWithEmptyPrice()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class, ['status' => EProductStatuses::DRAFT, 'price' => null]);

        $this->tester->expectThrowable(DomainException::class, function() use ($product) {
            $product->setNewStatus(EProductStatuses::ACTIVE);
        });
    }


    public function testSetNewStatus()
    {
        $brand = $this->tester->have(Brand::class);
        $category = $this->tester->have(Category::class);
        $product = $this->tester->have(Product::class, ['status' => EProductStatuses::DRAFT, 'price' => 99.99]);

        $product->setNewStatus(EProductStatuses::ACTIVE);
        expect('product has correct status', $product->isActive())->true();
    }

}