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

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->safeEmail,
//         'password' => bcrypt(str_random(10)),
//         'remember_token' => str_random(10),
//     ];
// });
// 
$factory->define(App\Models\Stok::class, function (Faker\Generator $faker) {
    return [
        'jumlah' => $faker->randomDigit,
    ];
});

$factory->define( App\Models\Produk::class, function (Faker\Generator $faker) use($factory) {
	$judul = $faker->sentence;
	$slug = str_slug($judul, '-');

    return [
        'judul' 	=> $judul,
        'slug' 		=> $slug,
        'berat'		=> $faker->randomDigitNotNull,
        'deskripsi'	=> $faker->paragraph(3),
        'harga'		=> $faker->numberBetween($min = 100, $max = 999),
        'created_at'	=> $faker->datetime(),
        'updated_at'	=> $faker->datetime(),
        'stok_id'	=> $factory->create(\App\Models\Stok::class)->id
    ];
});

$factory->define( \App\Models\Kategori::class, function (Faker\Generator $faker) use($factory) {
	return [
		'nama' => $faker->sentence,
		'deskripsi' => $faker->paragraph(2),
        'created_at'	=> $faker->datetime(),
        'updated_at'	=> $faker->datetime()
	];
});