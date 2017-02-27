<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Persona::class, function (Faker\Generator $faker) {
    return [
        'cedula' => rand(1111111,99999999), 
        'primer_nombre' => $faker->firstName,
        'segundo_nombre' => $faker->firstName,
        'primer_apellido' => $faker->lastName,
        'segundo_apellido' => $faker->lastName,
        'genero' => $faker->randomElement(['Masculino', 'Femenino']),
        'fecha_nacimento' => $faker->dateTimeBetween('-35 years', '-15 years')->format('Y-m-d'),
        'telefono_uno' => '04167362763',
        'telefono_dos' => '04123907297',
        'direccion' => 'por alli'
    ];
});