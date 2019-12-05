<?php

namespace App\Services\Product;

use App\Models\ProductCharacteristicValue;

/**
 * Service for product characteristics management
 */
class ProductsCharacteristicsManageService
{

    /**
     * Set product characteristic value.
     *
     * @param int $productId product ID
     * @param int $characteristicId characteristic ID
     * @param mixed $value characteristic value
     */
    public function setValue(int $productId, int $characteristicId, $dirtyValue): void
    {
        $pureValue = empty($dirtyValue) ? null : $dirtyValue;
        $pcvModel = ProductCharacteristicValue::where([
            'product_id' => $productId,
            'characteristic_id' => $characteristicId,
        ])->first();

        // Normal value
        if ($pureValue) {
            // Record exist?
            if ($pcvModel) {
                $pcvModel->value = $pureValue;
                $pcvModel->saveOrFail();
            } else {
                // Create new record only if value not empty
                $pcvModel = new ProductCharacteristicValue();
                $pcvModel->product_id = $productId;
                $pcvModel->characteristic_id = $characteristicId;
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
