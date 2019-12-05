<?php

namespace App\Services\Product;

use App\Models\ProductAttributeValue;

/**
 * Service for product attributes management
 */
class ProductsAttributesManageService
{

    /**
     * Set product attribute value.
     *
     * @param int $productId product ID
     * @param int $attributeId attribute ID
     * @param mixed $value attribute value
     */
    public function setValue(int $productId, int $attributeId, $dirtyValue): void
    {
        $pureValue = empty($dirtyValue) ? null : $dirtyValue;
        $pcvModel = ProductAttributeValue::where([
            'product_id' => $productId,
            'attribute_id' => $attributeId,
        ])->first();

        // Normal value
        if ($pureValue) {
            // Record exist?
            if ($pcvModel) {
                $pcvModel->value = $pureValue;
                $pcvModel->saveOrFail();
            } else {
                // Create new record only if value not empty
                $pcvModel = new ProductAttributeValue();
                $pcvModel->product_id = $productId;
                $pcvModel->attribute_id = $attributeId;
                $pcvModel->value = $pureValue;
                $pcvModel->saveOrFail();
            }
        } else {
            // Empty value
            // Record exist?
            if ($pcvModel) {
                $pcvModel->delete();
            }
        }
    }

}
