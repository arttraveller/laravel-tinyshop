<?php

namespace App\Shop\Services;

use App\Shop\Models\Characteristic;

/**
 * Service for characteristics management
 */
class CharacteristicsManageService
{

    /**
     * Creates new characteristic.
     *
     * @param array $data
     * @return Characteristic
     */
    public function create(array $data): Characteristic
    {
        if ($data['sort'] > 0) {
            $sort = (int)$data['sort'];
        } else {
            $maxSort = (int)Characteristic::max('sort');
            $sort = $maxSort + 1;
        }

        return Characteristic::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'is_required' => $data['is_required'],
            'default_value' => $data['default_value'],
            'variants' => $data['variants'],
            'sort' => $sort,
        ]);
    }

}
