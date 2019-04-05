<?php

namespace App\Shop\Services;

use App\Helpers\Json;
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
        $variantsJson = Json::encode($data['variants']);

        return Characteristic::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'required' => $data['required'],
            'default' => $data['default'],
            'variants_json' => $variantsJson,
            'sort' => $data['sort'],
        ]);
    }

}
