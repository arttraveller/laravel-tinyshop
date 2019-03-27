<?php

namespace App\Shop\Services\Brands;

use App\Http\Requests\Backend\BrandsRequest;
use App\Shop\Models\Brand;

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

}
