<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    $users = App\User::where('id', '!=', 1)->pluck('id')->toArray();
    $status=['Pending','In Progress','Rejected','Completed'];
    return [
        
        'user_id'=> $faker->randomElement($users),
        'subject'=> $faker->realText(80),
        'status'=> $faker->randomElement($status),
        'created_at' => $faker->dateTimeThisMonth(),
    ];
});
 