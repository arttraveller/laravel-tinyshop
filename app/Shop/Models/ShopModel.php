<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Base shop model
 */
abstract class ShopModel extends Model
{

    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

}
