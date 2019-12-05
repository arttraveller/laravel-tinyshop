<?php

namespace App\Helpers;

use App\Models\Characteristic;

/**
 * Characteristics helper
 */
class Characteristics
{

    /**
     * Returns array [variantTitle => variantTitle]
     *
     * @return array
     */
    public static function getVariantsList(Characteristic $characteristic): array
    {
        $result = $characteristic->getVariants();
        if (count($result) > 0) {
            $variants = array_map('trim', $result);
            $result = array_combine($variants, $variants);
        }

        return $result;
    }

}
