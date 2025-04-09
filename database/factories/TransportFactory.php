<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => str(str()->random(10))->upper(),
            'note' => fake()->boolean(50)
                ? fake()->paragraph(fake()->numberBetween(1, 3))
                : null,
            'status' => fake()->numberBetween(0, 3),
        ];
    }
}
