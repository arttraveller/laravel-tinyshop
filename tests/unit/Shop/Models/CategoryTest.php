<?php

use App\Shop\Models\Category;
use Tests\unit\BaseUnit;

class CategoryTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $category = $this->tester->haveRecord(Category::class, ['name' => 'Some cat', 'slug' => 'some-cat']);
        $catId = $category->id;
        $this->assertTrue($category->canDelete());
        $category->delete();
        $this->tester->dontSeeRecord(Category::class, ['id' => $catId]);
    }

}