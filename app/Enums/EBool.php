<?php

namespace App\Enums;

/**
 * Boolean type
 */
class EBool extends BaseEnum
{

    const NO = 0;
    const YES = 1;


    /**
     * {@inheritdoc}
     */
    public static function getLabels(): array
    {
       return [
            self::NO   => __('No'),
            self::YES   => __('Yes'),
       ];
    }

}
