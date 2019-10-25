<?php

namespace App\Services;

use App\Http\Requests\Backend\BrandsRequest;
use App\Models\Brand;

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
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
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
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
        ]);

        return $brand;
    }

}
