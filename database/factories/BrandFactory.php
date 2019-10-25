<?php

use App\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $companyName = $faker->company
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $companyName,
        'slug' => Str::slug($companyName),
        'meta_title' => $companyName . ' - title',
        'meta_description' => $companyName . ' - description',
        'meta_keywords' => $companyName . ' - keywords',
    ];
});
