<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Characteristic model
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property boolean $required
 * @property string $default
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
        'required',
        'default',
        'variants_json',
        'sort'
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_characteristic';



    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
