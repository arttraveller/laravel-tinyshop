<?php

use App\Shop\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $catName = ucfirst($faker->word);
    return [
        'name' => $catName,
        'slug' => Str::slug($catName),
        'description' => $faker->paragraph,
        'meta_title' => $catName . ' - title',
        'meta_description' => $catName . ' - description',
        'meta_keywords' => $catName . ' - keywords',
    ];
});
