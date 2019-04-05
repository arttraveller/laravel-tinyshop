<?php

namespace App\Shop\Enums;

use App\Enums\BaseEnum;

/**
 * Characteristic types
 */
class ECharacteristicTypes extends BaseEnum
{

    const STRING = 1;
    const INTEGER = 2;
    const FLOAT = 3;


    /**
     * {@inheritdoc}
     */
    public static function getLabels(): array
    {
       return [
            self::STRING => __('String'),
            self::INTEGER => __('Integer'),
            self::FLOAT => __('Float'),
       ];
    }

}
