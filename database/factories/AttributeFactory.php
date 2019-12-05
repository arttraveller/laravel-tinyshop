<?php

use App\Enums\EAttributeTypes;
use App\Models\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {
    $attrName = $faker->word
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $attrName,
        'type' => random_int(EAttributeTypes::STRING, EAttributeTypes::FLOAT),
        'is_required' => $faker->boolean,
        'sort' => random_int(1, 100),
    ];
});
