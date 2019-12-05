<?php

namespace App\Models;

/**
 * Product and category rel model
 *
 * @property integer $product_id
 * @property integer $category_id
 */
class ProductToCategory extends ShopModel
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
        'category_id',
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_products_categories';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        return true;
    }

}
