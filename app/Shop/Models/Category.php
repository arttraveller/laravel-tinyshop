<?php

namespace App\Shop\Models;

use Kalnoy\Nestedset\NodeTrait;

/**
 * Category model
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property int $parent_id
 */
class Category extends ShopModel
{

    use NodeTrait;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_categories';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
