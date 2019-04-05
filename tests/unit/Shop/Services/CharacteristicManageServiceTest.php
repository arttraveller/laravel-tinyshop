<?php

use App\Shop\Enums\ECharacteristicTypes;
use App\Shop\Models\Characteristic;
use App\Shop\Services\CharacteristicsManageService;
use Tests\unit\BaseUnit;

class CharacteristicManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $charData = [
            'name' => 'New characteristic',
            'type' => ECharacteristicTypes::STRING,
            'is_required' => '0',
            'default_value' => '',
            'variants' => '"Variant 1\r\nVariant 2"',
            'sort' => '',
        ];
        $newChar = (new CharacteristicsManageService())->create($charData);

        $this->tester->seeRecord(Characteristic::class, [
            'name' => $charData['name'],
            'type' => $charData['type'],
            'is_required' => false,
            'variants' => $charData['variants'],
             // Auto set sort
            'sort' => 1,
        ]);
        expect('new characteristic can be deleted', $newChar->canDelete())->true();
    }

}