<?php

namespace App\Shop\Services\Brands;

use App\Http\Requests\Backend\BrandsRequest;
use App\Shop\Models\Brand;
use common\exceptions\DeleteFromDbException;
use LogicException;

/**
 * Service for brands management
 */
class BrandsManageService
{

    /**
     * Creates new brand.
     *
     * @param BrandsRequest $request
     * @return Brand
     */
    public function create(array $data): Brand
    {
        return Brand::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $data['title'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
        ]);
    }



    /**
     * Updates the brand.
     *
     * @param Brand $brand
     * @param BrandsRequest $request
     * @return Brand
     */
    public function update(Brand $brand, array $data): Brand
    {
        $brand->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'title' => $data['title'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
        ]);

        return $brand;
    }


    /**
     * Deletes the brand.
     *
     * @param Brand $brand
     */
    public function delete(Brand $brand): void
    {
        if (!$brand->canDelete()) {
            throw new LogicException('This brand cannot be deleted');
        }
        if (!$brand->delete()) {
            throw new DeleteFromDbException('An error occurred while deleting a brand');
        }
    }

}
