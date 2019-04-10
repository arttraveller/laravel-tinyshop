<?php

namespace App\Shop\Enums;

use App\Enums\BaseEnum;

/**
 * Product statuses
 */
class EProductStatuses extends BaseEnum
{

    const DRAFT = 1;
    const ACTIVE = 2;


    /**
     * {@inheritdoc}
     */
    public static function getLabels(): array
    {
       return [
            self::DRAFT => __('Draft'),
            self::ACTIVE => __('Active'),
       ];
    }

}
