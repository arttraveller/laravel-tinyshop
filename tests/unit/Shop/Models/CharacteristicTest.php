<?php

use App\Shop\Enums\ECharacteristicTypes;
use App\Shop\Models\Characteristic;
use Tests\unit\BaseUnit;

class CharacteristicTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $char = $this->tester->haveRecord(Characteristic::class, [
            'name' => 'Some char',
            'type' => ECharacteristicTypes::STRING,
            'required' => false,
            'sort' => 1
        ]);
        $charId = $char->id;
        $this->assertTrue($char->canDelete());
        $char->delete();
        $this->tester->dontSeeRecord(Characteristic::class, ['id' => $charId]);
    }

}