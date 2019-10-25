<?php

use App\Enums\ECharacteristicTypes;
use App\Models\Characteristic;
use Tests\unit\BaseUnit;

class CharacteristicTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $char = $this->tester->haveRecord(Characteristic::class, [
            'name' => 'Some char',
            'type' => ECharacteristicTypes::STRING,
            'is_required' => false,
            'sort' => 1
        ]);
        $charId = $char->id;
        $this->assertTrue($char->canDelete());
        $char->delete();
        $this->tester->dontSeeRecord(Characteristic::class, ['id' => $charId]);
    }

}
