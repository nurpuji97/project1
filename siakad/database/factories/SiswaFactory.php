<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Siswa::class, function (Faker $faker) {
    return [
        'nis' => $faker->ean8 ,
        'nisn' => $faker->isbn10 ,
        'nama' => $faker->name,
        'jeniskelamin' => $faker->randomElement(['Laki-Laki','Perempuan']),
        'tempatlahir' => $faker->city,
        'tanggallahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'agama' => $faker->randomElement(['Islam','Katolik','Protestan','Hindu','Buddha']),
        'statuskeluarga' => '',
        'anakke' => '',
        'alamat' => $faker->address,
        'telprumah' => $faker->phoneNumber,
        'sekolahasal' => $faker->catchPhrase,
    ];
});
