<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Message::class, function (Faker $faker) {
	do {
		$student_id = rand(1,25);
		$lecturer_id = rand(1,25);
		$status = rand(0,1);
        $unread_s = rand(0,1);
		$unread_l = rand(0,1);
	} while ($student_id === $lecturer_id);
    return [
        'student_id' => $student_id,
        'lecturer_id' => $lecturer_id,
        'message' => $faker->sentence,
        'status' => $status,
        'unread_s' => $unread_s,
        'unread_l' => $unread_l
    ];
});
