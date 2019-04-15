<?php

namespace App\Shop\Services;

use App\Shop\Models\Product;
use App\Shop\Models\ProductToCategory;

/**
 * Service for product categories management
 */
class ProductsCategoriesManageService
{

    /**
     * Changes the main category.
     *
     * @param Product $product
     * @param int $newMainCategoryId
     */
    public function changeMainCategory(Product $product, int $newMainCategoryId): void
    {
        $product->main_category_id = $newMainCategoryId;
        $product->saveOrFail();
    }


    /**
     * Adds another additional category.
     *
     * @param Product $product
     * @param int $categoryId
     */
    public function assignAddiCategory(Product $product, int $categoryId): void
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
    public function revokeAllAddiCategories(Product $product): void
    {
        ProductToCategory::where('product_id', $product->id)->delete();
    }

}
