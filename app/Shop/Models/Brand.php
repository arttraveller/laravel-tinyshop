<?php

namespace App\Shop\Models;

/**
 * Brand model
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class Brand extends ShopModel
{

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'slug', 'title', 'description', 'keywords'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_brands';


    /**
     * Can this brand be deleted
     *
     * @return bool
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
