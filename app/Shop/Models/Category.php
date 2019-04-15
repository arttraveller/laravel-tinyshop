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
 * @property int|null $parent_id
 * @property int $depth
 */
class Category extends ShopModel
{

    use NodeTrait;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'slug', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'parent_id'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_categories';



    /**
     * Get products where main_category_id is it category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mainProducts()
    {
        return $this->hasMany(Product::class, 'main_category_id');
    }


    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        $numProducts = ($this->main_products_count === null) ? $this->mainProducts()->count() : $this->main_products_count;
        $result = ($numProducts > 0) ? false : true;

        return $result;
    }

}
