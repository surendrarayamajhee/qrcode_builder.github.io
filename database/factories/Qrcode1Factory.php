<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Qrcode1;
use Faker\Generator as Faker;

$factory->define(Qrcode1::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'brand_name' => $faker->word,
        'product_name' => $faker->word,
        'quantity' => $faker->word,
        'qrcode_path' => $faker->word,
        'amount' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
