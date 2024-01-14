<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    public function definition(): array
    {
        return [
            'job_number' => '123',
            'geha' =>  'كليه الطب  جامعه ينها',
             'password' => Hash::make('password') ,
             'is_manger' => 0 ,
             'kehta_id' => 1 ,
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
