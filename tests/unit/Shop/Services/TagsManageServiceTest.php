<?php

use App\Shop\Models\Tag;
use App\Shop\Services\TagsManageService;
use Tests\unit\BaseUnit;

class TagsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $data = $this->getValidData();
        $newTag = (new TagsManageService())->create($data);
        $this->tester->seeRecord(Tag::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
        expect('new tag can be deleted', $newTag->canDelete())->true();
    }


    public function testSuccessfulUpdate()
    {
        $oldTagName = 'Old tag';
        $oldTagSlug = 'old-tag';
        $oldTag = $this->tester->haveRecord(Tag::class, ['name' => $oldTagName, 'slug' => $oldTagSlug]);

        $data = $this->getValidData();
        (new TagsManageService())->update($oldTag, [
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
        $this->tester->seeRecord(tag::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);
    }



    private function getValidData(): array
    {
        return [
            'name' => 'New tag',
            'slug' => 'new-tag',
        ];
    }

}