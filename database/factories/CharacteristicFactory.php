<?php

use App\Enums\Shop\ECharacteristicTypes;
use App\Shop\Models\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    $charName = $faker->word
                    . ' (' . Str::random(16) . ')';
    return [
        'name' => $charName,
        'type' => random_int(ECharacteristicTypes::STRING, ECharacteristicTypes::FLOAT),
        'required' => $faker->boolean,
        'sort' => random_int(1, 100),
    ];
});