<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $catName = $faker->company
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $catName,
        'slug' => Str::slug($catName),
        'description' => $faker->paragraph,
        'meta_title' => $catName . ' - title',
        'meta_description' => $catName . ' - description',
        'meta_keywords' => $catName . ' - keywords',
    ];
});
