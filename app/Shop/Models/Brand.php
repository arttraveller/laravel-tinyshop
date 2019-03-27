<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

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

    use Sortable;


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
