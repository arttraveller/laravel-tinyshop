<?php

use App\Shop\Models\Category;
use App\Shop\Services\CategoriesManageService;
use Tests\unit\BaseUnit;

class CategoriesManageServiceTest extends BaseUnit
{

    public function testCreateCatAsRoot()
    {
        $data = $this->getValidData();
        // Set parent_id as NULL
        $data['parent_id'] = null;
        $newCat = (new CategoriesManageService())->create($data);

        $this->tester->seeRecord(Category::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'parent_id' => null,
        ]);
        expect('new category can be deleted', $newCat->canDelete())->true();
        expect('new category correct _lft and _rgt', ($newCat->_lft == 1 && $newCat->_rgt == 2))->true();
    }


    public function testCreateCatAsChild()
    {
        $parentCat = $this->tester->haveRecord(Category::class, ['name' => 'Parent category', 'slug' => 'parent-cat']);
        $data = $this->getValidData();
        // Set parent_id as $parentCat->id
        $data['parent_id'] = $parentCat->id;
        $childCat = (new CategoriesManageService())->create($data);

        // New category was created
        $this->tester->seeRecord(Category::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'parent_id' => $parentCat->id,
        ]);
        // Refresh parent models
        $parentCat->refresh();
        expect('parent category correct _lft', ($parentCat->_lft == 1))->true();
        expect('parent category correct _rgt', ($parentCat->_rgt == 4))->true();
        expect('child category correct _lft', ($childCat->_lft == 2))->true();
        expect('child category correct _rgt', ($childCat->_rgt == 3))->true();
    }


    public function testSuccessfulUpdate()
    {
        $parentCat = $this->tester->haveRecord(Category::class, ['name' => 'Parent category', 'slug' => 'parent-cat']);
        $oldCatName = 'Old cat';
        $oldCatSlug = 'old-cat';
        $oldCat = $this->tester->haveRecord(Category::class, ['name' => $oldCatName, 'slug' => $oldCatSlug]);

        $data = $this->getValidData();
        $data['parent_id'] = $parentCat->id;
        (new CategoriesManageService())->update($oldCat, $data);

        $this->tester->seeRecord(Category::class, [
            'id' => $oldCat->id,
            'name' => $data['name'],
            'slug' => $data['slug'],
            '_lft' => 2,
            '_rgt' => 3,
            'parent_id' => $parentCat->id,
        ]);
        // Refresh parent models
        $parentCat->refresh();
        expect('parent category correct _lft', ($parentCat->_lft == 1))->true();
        expect('parent category correct _rgt', ($parentCat->_rgt == 4))->true();
    }



    private function getValidData(): array
    {
        return [
            'name' => 'New category',
            'slug' => 'new-category',
            'description' => 'New category description',
            'meta_title' => 'New category title',
            'meta_description' => 'New category description',
            'meta_keywords' => 'New category keywords',
        ];
    }

}