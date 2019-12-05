<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKey;

/**
 * Product attribute value (EAV) model
 *
 * @property integer $product_id
 * @property integer $attribute_id
 * @property mixed $value
 */
class ProductAttributeValue extends ShopModel
{
    use HasCompositePrimaryKey;

    /**
     * {@inheritdoc}
     */
    public $incrementing = false;

    /**
     * {@inheritdoc}
     */
    protected $primaryKey = ['product_id', 'attribute_id'];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'product_id',
        'attribute_id',
        'value',
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_products_attributes_values';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        return true;
    }

}
