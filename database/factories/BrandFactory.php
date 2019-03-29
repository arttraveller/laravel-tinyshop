<?php

use App\Shop\Models\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $companyName = $faker->company
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $companyName,
        'slug' => Str::slug($companyName),
        'title' => $companyName . ' - title',
        'description' => $companyName . ' - description',
        'keywords' => $companyName . ' - keywords',
    ];
});