<?php

use App\Enums\EAttributeTypes;
use App\Models\Attribute;
use App\Services\AttributesManageService;
use Tests\unit\BaseUnit;

class AttributeManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $attrData = [
            'name' => 'New attribute',
            'type' => EAttributeTypes::STRING,
            'is_required' => '0',
            'default_value' => '',
            'variants' => '"Variant 1\r\nVariant 2"',
            'sort' => '',
        ];
        $newAttr = (new AttributesManageService())->create($attrData);

        $this->tester->seeRecord(Attribute::class, [
            'name' => $attrData['name'],
            'type' => $attrData['type'],
            'is_required' => false,
            'variants' => $attrData['variants'],
             // Auto set sort
            'sort' => 1,
        ]);
        expect('new attribute can be deleted', $newAttr->canDelete())->true();
    }



    public function testSuccessfulUpdate()
    {
        $attr = $this->tester->haveRecord(Attribute::class, [
            'name' => 'Some Attribute',
            'type' => EAttributeTypes::STRING,
            'is_required' => '0',
            'default_value' => '',
            'variants' => '',
            'sort' => 1,
        ]);

        $newData = [
            'name' => 'Updated attribute',
            'type' => EAttributeTypes::FLOAT,
            'is_required' => '1',
            'default_value' => '123.45',
            'variants' => 'test',
            'sort' => 2,
        ];
        (new AttributesManageService())->update($attr, $newData);

        $this->tester->seeRecord(Attribute::class, [
            'id' => $attr->id,
            'name' => $newData['name'],
            'type' => $newData['type'],
            'is_required' => $newData['is_required'],
            'default_value' => $newData['default_value'],
            'variants' => $newData['variants'],
            'sort' => $newData['sort'],
        ]);
    }

}
