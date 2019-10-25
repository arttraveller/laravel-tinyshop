<?php

namespace App\Services;

use App\Enums\EProductStatuses;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Service for products management
 */
class ProductsManageService
{

    /**
     * Creates new product.
     *
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        $result = null;
        DB::beginTransaction();
        try {
            // 1. Create product
            /** @var Product $newProduct */
            $newProduct = Product::create([
                'code' => $data['code'],
                'name' => $data['name'],
                'description' => $data['description'],
                // Status for writing to the DB, below will be used setNewStatus method
                'status' => EProductStatuses::DRAFT,
                'main_category_id' => $data['main_category_id'],
                'brand_id' => $data['brand_id'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
            ]);
            // 2. Set price
            if ($data['price'] > 0) {
                $newProduct->setPrice($data['price'], $data['old_price']);
            }
            // 3. Set status
            $newProduct->setNewStatus($data['status']);

            // 4. Assign additional categories
            // TODO
            // 5a. Assign existing tags
            // TODO
            // 5b. Create and assign new tags
            // TODO
            // 6. Set characteristics
            // TODO

            DB::commit();
            $result = $newProduct;
        } catch(Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return $result;
    }

}
