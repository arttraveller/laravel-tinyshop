<?php

use App\Shop\Models\Brand;
use Tests\unit\BaseUnit;

class BrandTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $brand = $this->tester->haveRecord(Brand::class, ['name' => 'Some brand', 'slug' => 'some-brand']);
        $brandId = $brand->id;
        $this->assertTrue($brand->canDelete());
        $brand->delete();
        $this->tester->dontSeeRecord(Brand::class, ['id' => $brandId]);
    }

}