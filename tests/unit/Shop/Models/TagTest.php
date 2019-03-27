<?php

use App\Shop\Models\Tag;
use Tests\unit\BaseUnit;

class TagTest extends BaseUnit
{

    public function testSuccessfulDelete()
    {
        $tag = $this->tester->haveRecord(Tag::class, ['name' => 'Some tag', 'slug' => 'some-tag']);
        $tagId = $tag->id;
        $this->assertTrue($tag->canDelete());
        $tag->delete();
        $this->tester->dontSeeRecord(Tag::class, ['id' => $tagId]);
    }

}