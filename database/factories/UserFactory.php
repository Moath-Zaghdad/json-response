<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// factory('App\Engineer', 20)->create();

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Engineer::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'city'	=>	$faker->city,
        'village'	=>	$faker->streetName,
        'profession'	=>	$faker->jobTitle,
        'socialNetworks'	=>	"fb.com/".str_random(10),
        'field'	=>	$faker->jobTitle,
        'avatar'	=>	"defaultImage.png",
        'mobileNumber1'	=>	$faker->phoneNumber,
        'mobileNumber2'	=>	$faker->phoneNumber,
        'telephoneNumber'	=>	$faker->phoneNumber,
        'created_at'	=>	$faker->dateTime,
	    'password'	=>	bcrypt('secret'),
        'status'    =>  random_int(0,1) ?? 0 ,
    ];
});

