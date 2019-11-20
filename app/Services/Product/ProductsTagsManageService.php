<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Models\ProductToTag;
use App\Services\TagsManageService;
use Illuminate\Support\Str;

/**
 * Service for product tags management
 */
class ProductsTagsManageService
{
    /**
     * Assign existing tag.
     *
     * @param Product $product
     * @param int $tagId
     */
    public function assignExistingTag(Product $product, int $tagId): void
    {
        $hasIt = (bool)ProductToTag::
        where('product_id', $product->id)
            ->where('tag_id', $tagId)
            ->count();
        if (!$hasIt) {
            ProductToTag::create([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);
        }
    }


    /**
     * Assign new tag.
     *
     * @param Product $product
     * @param string $newTagName new tag name
     */
    public function assignNewTag(Product $product, string $newTagName): void
    {
        $newTagName = trim($newTagName);
        $newTag = (new TagsManageService())->create([
            'name' => $newTagName,
            'slug' => Str::slug($newTagName),
        ]);
        $this->assignExistingTag($product, $newTag->id);
    }

}
