<?php

namespace App\Services;

use App\Models\Attribute;

/**
 * Service for attributes management
 */
class AttributesManageService
{

    /**
     * Creates new attribute.
     *
     * @param array $data
     * @return Attribute
     */
    public function create(array $data): Attribute
    {
        if ($data['sort'] > 0) {
            $sort = (int)$data['sort'];
        } else {
            $maxSort = (int)Attribute::max('sort');
            $sort = $maxSort + 1;
        }

        return Attribute::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'is_required' => $data['is_required'],
            'default_value' => $data['default_value'],
            'variants' => $data['variants'],
            'sort' => $sort,
        ]);
    }



    /**
     * Updates the attribute.
     *
     * @param Attribute $attribute
     * @param array $data
     * @return Attribute
     */
    public function update(Attribute $attribute, array $data): Attribute
    {
        $attribute->update([
            'name' => $data['name'],
            'type' => $data['type'],
            'is_required' => $data['is_required'],
            'default_value' => $data['default_value'],
            'variants' => $data['variants'],
            'sort' => $data['sort'],
        ]);

        return $attribute;
    }

}
