<?php

use App\Shop\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tagName = $faker->word;
    return [
        'name' => $tagName,
        'slug' => Str::slug($tagName),
    ];
});
