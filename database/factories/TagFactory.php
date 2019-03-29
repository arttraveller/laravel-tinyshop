<?php

use App\Shop\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tagName = $faker->word
        . ' (' . Str::random(16) . ')';
    return [
        'name' => $tagName,
        'slug' => Str::slug($tagName),
    ];
});