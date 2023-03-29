<?php

namespace Database\Factories;

use App\Http\Controllers\Auth\SignupController;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $displayName = SignupController::generateRandomDisplayName(false);
        return [
            'display_name' =>  [$displayName, $faker->userName][array_rand([1,2])],
            'cid' => $displayName . '_' . bin2hex(random_bytes(20)),
            'status' => [$faker->sentence, null][array_rand([1,2])],
            'about_me' => [$faker->sentence, null][array_rand([1,2])],
            'birthday' => $faker->dateTimeBetween('-100 years', '-12 years')->format('Y-m-d'),
            'password' => Hash::make('12345Aa$'), // password
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email' => null,
        ]) || $this->state(fn (array $attributes) => [
            'phone' => null,
        ]);
    }
}
