<?php

use App\Shop\Models\Brand;
use App\Shop\Services\Brands\BrandsManageService;
use Tests\unit\BaseUnit;

class BrandsManageServiceTest extends BaseUnit
{

    public function testCreateWithValidData()
    {
        $data = $this->getValidData();
        (new BrandsManageService())->create($data);
        $this->tester->seeRecord(Brand::class, [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $data['title'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
        ]);
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


//    public function testSuccessfulDelete()
//    {
//        $brand = $this->tester->haveRecord(Brand::class, ['name' => 'Some brand', 'slug' => 'some-brand']);
//        $delBrandId = $brand->id;
//        $this->tester->seeRecord(Brand::class, ['id' => $delBrandId]);
//        (new BrandsManageService())->delete($brand);
//        $this->tester->dontSeeRecord(Brand::class, ['id' => $delBrandId]);
//    }


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