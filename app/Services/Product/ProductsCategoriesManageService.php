<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Models\ProductToCategory;

/**
 * Service for product categories management
 */
class ProductsCategoriesManageService
{

    /**
     * Adds another category.
     *
     * @param Product $product
     * @param int $categoryId
     */
    public function assignCategory(Product $product, int $categoryId): void
    {
        $hasIt = (bool)ProductToCategory::
                        where('product_id', $product->id)
                        ->where('category_id', $categoryId)
                        ->count();
        if (!$hasIt) {
            ProductToCategory::create([
                'product_id' => $product->id,
                'category_id' => $categoryId,
            ]);
        }
    }


    /**
     * Revoke all additional categories.
     *
     * @param Product $product
     */
    public function revokeAllCategories(Product $product): void
    {
        ProductToCategory::where('product_id', $product->id)->delete();
    }

}
