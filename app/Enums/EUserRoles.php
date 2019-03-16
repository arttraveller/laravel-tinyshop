<?php

namespace App\Enums;

/**
 * User roles
 */
class EUserRoles extends BaseEnum
{

    const ADMIN = 1;
    const USER = 2;


    /**
     * {@inheritdoc}
     */
    public static function getLabels(): array
    {
       return [
            self::ADMIN   => __('Admin'),
            self::USER   => __('User'),
       ];
    }

}
