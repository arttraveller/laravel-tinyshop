<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Tag model
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 */
class Tag extends ShopModel
{

    use Sortable;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name', 'slug'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_tags';


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
