<?php

namespace Database\Factories;

use App\Http\Controllers\Auth\SignupController;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        $displayName = SignupController::generateRandomDisplayName(false);
        return [
            'display_name' => $displayName,
            'password' => Hash::make('12345Aa$'), // password
            'cid' => $displayName . '_' . bin2hex(random_bytes(20))
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
