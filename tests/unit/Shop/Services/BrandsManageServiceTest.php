<?php

use App\Shop\Models\Brand;
use App\Shop\Services\Brands\BrandsManageService;
use Tests\unit\BaseUnit;

class BrandsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $data = $this->getValidData();
        $newBrand = (new BrandsManageService())->create($data);
        $this->tester->seeRecord(Brand::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $data['title'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
        ]);
        expect('new brand can be deleted', $newBrand->canDelete())->true();
    }


    public function testSuccessfulUpdate()
    {
        $oldBrandName = 'Old brand';
        $oldBrandSlug = 'old-slug';
        $oldBrand = $this->tester->haveRecord(Brand::class, ['name' => $oldBrandName, 'slug' => $oldBrandSlug]);

        $data = $this->getValidData();
        (new BrandsManageService())->update($oldBrand, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $oldBrand->title,
            'description' => $oldBrand->description,
            'keywords' => $oldBrand->keywords,
        ]);
        $this->tester->seeRecord(Brand::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $oldBrand->title,
            'description' => $oldBrand->description,
            'keywords' => $oldBrand->keywords,
        ]);
    }



    private function getValidData(): array
    {
        return [
            'name' => 'New brand',
            'slug' => 'new-brand',
            'title' => 'New brand title',
            'description' => 'New brand description',
            'keywords' => 'New brand keywords',
        ];
    }

}