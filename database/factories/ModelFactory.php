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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

# seeder buku table

$factory->define(App\Buku::class, function(Faker\Generator $faker){
	return [
		'id_buku' => $faker->uuid,
		'isbn' => $faker->numerify('###-###-###-###-#'),
		'judul_buku' => $faker->sentence($nbwords = 3, $variableNbWords = true),
		'nama_pengarang' => $faker->name,
		'tahun_terbit' => $faker->year,
		'penerbit' => $faker->sentence($nbwords =  3, $variableNbWords=true),
		'jumlah_buku' => $faker->randomDigit,
		'no_rak_buku' => $faker->numerify('buku-###')
	];
});

# Seeder Mahasiswa
$factory->define(App\Mahasiswa::class, function(Faker\Generator $faker){
	return [
		'nim' => $faker->numberBetween($min = 000000000000000 , 999999999999999),
		'nama' => $faker->name,
		'kelas' => $faker->numerify('K-##'),
		'jenis_kelamin' => $faker->randomElement($array = array('pria','wanita')),
		'alamat' => $faker->address
	];
});

#Seeder Peminjaman
$factory->define(App\Peminjaman::class, function(Faker\Generator $faker){
	return [
		'id_peminjaman' => $faker->uuid,
		'tanggal_peminjaman' => $faker->date(),
		'tanggal_batas_pengembalian' => $faker->date(),
		'nim' => factory(App\Mahasiswa::class)->create()->nim,
		'id_buku' => factory(App\Buku::class)->create()->id_buku
	];
});

