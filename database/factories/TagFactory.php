<?php

use App\Shop\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $tagName = getUniqueTagName($faker);
    return [
        'name' => $tagName,
        'slug' => Str::slug($tagName),
    ];
});

if (!function_exists('getUniqueTagName')) {
    function getUniqueTagName(Faker $faker): string
    {
        $result = $faker->word;
        $numCompany = Tag::where('name', $result)->count();
        if ($numCompany > 0) {
            $result = Str::random(32);
        }

        return $result;
    }
}