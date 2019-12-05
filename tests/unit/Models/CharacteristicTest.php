<?php

use App\Enums\EAttributeTypes;
use App\Models\Attribute;
use Tests\unit\BaseUnit;

class AttributeTest extends BaseUnit
{

    public function testGetVariants()
    {
        $attr = $this->tester->haveRecord(Attribute::class, [
            'name' => 'Some attr',
            'type' => EAttributeTypes::STRING,
            'is_required' => false,
            'variants' => "Color 1\nColor 2\nColor 3",
            'sort' => 1
        ]);

        expect('Attribute has three variants', (count($attr->getVariants())) === 3);
    }


    public function testSuccessfulDelete()
    {
        $attr = $this->tester->haveRecord(Attribute::class, [
            'name' => 'Some attr',
            'type' => EAttributeTypes::STRING,
            'is_required' => false,
            'sort' => 1
        ]);
        $attrId = $attr->id;
        $this->assertTrue($attr->canDelete());
        $attr->delete();
        $this->tester->dontSeeRecord(Attribute::class, ['id' => $attrId]);
    }

}
