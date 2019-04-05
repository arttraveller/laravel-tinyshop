<?php

use App\Shop\Enums\ECharacteristicTypes;
use App\Shop\Models\Characteristic;
use App\Shop\Services\CharacteristicsManageService;
use Tests\unit\BaseUnit;

class CharacteristicManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $data = $this->getValidData();
        $newChar = (new CharacteristicsManageService())->create($data);
        $this->tester->seeRecord(Characteristic::class, [
            'name' => $data['name'],
            'type' => $data['type'],
            'required' => false,
            'default' => $data['default'],
            // TODO variants
            'sort' => $data['sort'],
        ]);
        expect('new characteristic can be deleted', $newChar->canDelete())->true();
    }



    private function getValidData(): array
    {
        return [
            'name' => 'New characteristic',
            'type' => ECharacteristicTypes::STRING,
            'required' => '0',
            'default' => 'Variant 1',
            'variants' => '"Variant 1\r\nVariant 2"',
            'sort' => 1,
        ];
    }

}