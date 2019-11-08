<?php

use App\Enums\ECharacteristicTypes;
use App\Models\Characteristic;
use App\Services\CharacteristicsManageService;
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



    public function testSuccessfulUpdate()
    {
        $char = $this->tester->haveRecord(Characteristic::class, [
            'name' => 'Some characteristic',
            'type' => ECharacteristicTypes::STRING,
            'is_required' => '0',
            'default_value' => '',
            'variants' => '',
            'sort' => 1,
        ]);

        $newData = [
            'name' => 'Updated characteristic',
            'type' => ECharacteristicTypes::FLOAT,
            'is_required' => '1',
            'default_value' => '123.45',
            'variants' => 'test',
            'sort' => 2,
        ];
        (new CharacteristicsManageService())->update($char, $newData);

        $this->tester->seeRecord(Characteristic::class, [
            'id' => $char->id,
            'name' => $newData['name'],
            'type' => $newData['type'],
            'is_required' => $newData['is_required'],
            'default_value' => $newData['default_value'],
            'variants' => $newData['variants'],
            'sort' => $newData['sort'],
        ]);
    }

}
