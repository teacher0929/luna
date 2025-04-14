<?php

namespace Database\Factories;

use App\Models\Transport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::where('is_admin', 0)->inRandomOrder()->first();
        $transport = Transport::inRandomOrder()->first();
        $weight = fake()->randomFloat(2, 0, 10);
        $weightPrice = 7;

        return [
            'user_id' => $user->id,
            'transport_id' => $transport->id,
            'code' => str(str()->random(20))->upper(),
            'barcode' => fake()->unique()->isbn13(),
            'weight' => $weight,
            'weight_price' => $weightPrice,
            'total_price' => $weight * $weightPrice,
            'note' => fake()->boolean(50)
                ? fake()->paragraph(fake()->numberBetween(1, 3))
                : null,
            'status' => $transport->status < 3
                ? $transport->status
                : fake()->numberBetween(3, 7),
            'payment_status' => fake()->numberBetween(0, 1),
        ];
    }
}
