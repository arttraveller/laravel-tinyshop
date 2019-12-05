<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKey;

/**
 * Product characteristic value (EAV) model
 *
 * @property integer $product_id
 * @property integer $characteristic_id
 * @property mixed $value
 */
class ProductCharacteristicValue extends ShopModel
{
    use HasCompositePrimaryKey;

    /**
     * {@inheritdoc}
     */
    public $incrementing = false;

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = ['product_id', 'characteristic_id'];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'product_id',
        'characteristic_id',
        'value',
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_products_characteristics_values';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        return true;
    }

}
