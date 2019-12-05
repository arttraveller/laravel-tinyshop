<?php

namespace App\Helpers;

use App\Models\Attribute;

/**
 * Attributes helper
 */
class Attributes
{

    /**
     * Returns array [variantTitle => variantTitle]
     *
     * @return array
     */
    public static function getVariantsList(Attribute $attribute): array
    {
        $result = $attribute->getVariants();
        if (count($result) > 0) {
            $variants = array_map('trim', $result);
            $result = array_combine($variants, $variants);
        }

        return $result;
    }

}
