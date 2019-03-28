<?php

use App\Shop\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $companyName = getUniqueCompanyName($faker);
    return [
        'name' => $companyName,
        'slug' => Str::slug($companyName),
        'title' => $companyName . ' - title',
        'description' => $companyName . ' - description',
        'keywords' => $companyName . ' - keywords',
    ];
});

if (!function_exists('getUniqueCompanyName')) {
    function getUniqueCompanyName(Faker $faker): string
    {
        $result = $faker->company;
        $numCompany = Brand::where('name', $result)->count();
        if ($numCompany > 0) {
            $result = Str::random(32);
        }

        return $result;
    }
}