<?php

namespace App\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use LogicException;

/**
 * Base shop model
 */
abstract class ShopModel extends Model
{

    /**
     * {@inheritdoc}
     */
    public $timestamps = false;



    /**
     * Can this model be deleted
     *
     * @return bool
     */
    abstract public function canDelete(): bool;


    /**
     * {@inheritdoc}
     */
    public function delete()
    {
        if (!$this->canDelete()) {
            throw new LogicException('This model cannot be deleted');
        }

        return parent::delete();
    }

}
