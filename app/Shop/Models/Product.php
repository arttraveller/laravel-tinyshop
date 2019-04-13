<?php

namespace App\Shop\Models;

use Kyslik\ColumnSortable\Sortable;

/**
 * Product model
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $main_category_id
 * @property int $brand_id
 * @property float $old_price
 * @property float $price
 * @property float $rating
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $created_at
 * @property integer $updated_at
 * @property Category $mainCategory
 * @property Brand $brand
 */
class Product extends ShopModel
{

    use Sortable;

    /**
     * {@inheritdoc}
     */
    public $timestamps = true;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'status',
        'main_category_id',
        'brand_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    /**
     * {@inheritdoc}
     */
    protected $table = 'shop_products';



    /**
     * Get main category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id');
    }


    /**
     * Get brand.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
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
