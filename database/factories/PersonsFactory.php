<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Persons;

$factory->define(Persons::class, function (Faker $faker) {
    return [
        'First_name' => $faker->firstName('male'|'female'),
        'Last_name' => $faker->lastName,
        'type_person' => '1',
        'Document' => $faker->numberBetween(15000000,30000000), 
        
    ];
});


