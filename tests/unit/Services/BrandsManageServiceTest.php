<?php

use App\Models\Brand;
use App\Services\BrandsManageService;
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
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
        ]);
        expect('new brand can be deleted', $newBrand->canDelete())->true();
    }


    public function testSuccessfulUpdate()
    {
        $oldBrandName = 'Old brand';
        $oldBrandSlug = 'old-brand';
        $oldBrand = $this->tester->haveRecord(Brand::class, ['name' => $oldBrandName, 'slug' => $oldBrandSlug]);

        $data = $this->getValidData();
        (new BrandsManageService())->update($oldBrand, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $oldBrand->meta_description,
            'meta_keywords' => $oldBrand->meta_keywords,
        ]);

        $this->tester->seeRecord(Brand::class, [
            'id' => $oldBrand->id,
            'name' => $data['name'],
            'slug' => $data['slug'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $oldBrand->meta_description,
            'meta_keywords' => $oldBrand->meta_keywords,
        ]);
    }



    private function getValidData(): array
    {
        return [
            'name' => 'New brand',
            'slug' => 'new-brand',
            'meta_title' => 'New brand title',
            'meta_description' => 'New brand description',
            'meta_keywords' => 'New brand keywords',
        ];
    }

}
