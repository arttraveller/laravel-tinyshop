<?php

use App\Shop\Enums\ECharacteristicTypes;
use App\Shop\Models\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    $charName = $faker->word
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $charName,
        'type' => random_int(ECharacteristicTypes::STRING, ECharacteristicTypes::FLOAT),
        'is_required' => $faker->boolean,
        'sort' => random_int(1, 100),
    ];
});