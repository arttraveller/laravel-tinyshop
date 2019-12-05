<?php

namespace App\Models;

/**
 * Product and tag rel model
 *
 * @property integer $product_id
 * @property integer $tag_id
 */
class ProductToTag extends ShopModel
{

    /**
     * {@inheritdoc}
     */
    public $incrementing = false;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'product_id',
        'tag_id',
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_products_tags';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        return true;
    }

}
