<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Brand model
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class Brand extends ShopModel
{

    use Sortable;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'slug', 'meta_title', 'meta_description', 'meta_keywords'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_brands';


    /**
     * Sortable columns
     *
     * @var array
     */
    public $sortable = ['id', 'name', 'slug'];


    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
