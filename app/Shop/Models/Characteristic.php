<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Characteristic model
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property boolean $is_required
 * @property string $default_value
 * @property string $variants
 * @property int $sort
 */
class Characteristic extends ShopModel
{

    use Sortable;


    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'name',
        'type',
        'is_required',
        'default_value',
        'variants',
        'sort'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_characteristics';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
