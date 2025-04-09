<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authMethod = fake()->numberBetween(0, 2);

        if ($authMethod == 2) {
            $username = fake()->unique()->email();
        } elseif ($authMethod == 1) {
            $username = fake()->unique()->numberBetween(60000000, 65999999);
        } else {
            $username = fake()->unique()->userName();
        }

        return [
            'name' => fake()->name(),
            'username' => $username,
            'password' => static::$password ??= Hash::make('password'),
            'auth_method' => $authMethod,
            'remember_token' => Str::random(10),
        ];
    }
}
