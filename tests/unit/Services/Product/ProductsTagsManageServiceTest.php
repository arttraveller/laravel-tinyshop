<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductToTag;
use App\Models\Tag;
use App\Services\Product\ProductsTagsManageService;
use Tests\unit\BaseUnit;

class ProductsTagsManageServiceTest extends BaseUnit
{

    public function testAssignExistingTag()
    {
        $brand = $this->tester->have(Brand::class);
        $product = $this->tester->have(Product::class);
        $tag = $this->tester->have(Tag::class);

        (new ProductsTagsManageService())->assignExistingTag($product, $tag->id);

        $this->tester->seeRecord(ProductToTag::class, [
            'product_id' => $product->id,
            'tag_id' => $tag->id,
        ]);
    }


    public function testAssignNewTag()
    {
        $brand = $this->tester->have(Brand::class);
        $product = $this->tester->have(Product::class);
        $newTagName = "new tag";

        (new ProductsTagsManageService())->assignNewTag($product, $newTagName);

        $tag = Tag::where('name', $newTagName)->first();
        expect('Tag successfully created', $tag)->isInstanceOf(Tag::class);
        $this->tester->seeRecord(ProductToTag::class, [
            'product_id' => $product->id,
            'tag_id' => $tag->id,
        ]);
    }

}
