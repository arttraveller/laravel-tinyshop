<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Attribute model
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property boolean $is_required
 * @property string $default_value
 * @property string $variants
 * @property int $sort
 */
class Attribute extends ShopModel
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
    protected $table = 'shop_attributes';


    /**
     * Does the attribute has variants.
     *
     * @return bool
     */
    public function hasVariants(): bool
    {
        return count($this->getVariants()) > 0 ? true : false;
    }


    /**
     * Get all variants.
     *
     * @return array
     */
    public function getVariants(): array
    {
        // TODO variants in JSON field
        return empty($this->variants) ? [] : explode("\n", $this->variants);
    }


    /**
     * {@inheritdoc}
     */
    public function canDelete(): bool
    {
        // TODO
        return true;
    }

}
