<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Package;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transports = Transport::where('status', '>', 0)
            ->orderBy('id')
            ->get();

        foreach ($transports as $transport) {
            for ($i = 1; $i <= $transport->status; $i++) {
                $updatedBy = User::where('is_admin', 1)
                    ->inRandomOrder()
                    ->first()
                    ->getName();

                Action::create([
                    'transport_id' => $transport->id,
                    'updated_by' => $updatedBy,
                    'updates' => [
                        'status' => $i,
                    ],
                    'note' => fake()->boolean(25)
                        ? fake()->paragraph(fake()->numberBetween(1, 3))
                        : null,
                ]);
            }
        }

        $packages = Package::where('status', '>', 0)
            ->orderBy('id')
            ->get();

        foreach ($packages as $package) {
            for ($i = 1; $i <= $package->status; $i++) {
                $updatedBy = $i <= 3
                    ? 'Back-end'
                    : User::where('is_admin', 1)
                        ->inRandomOrder()
                        ->first()
                        ->getName();

                if ($i > 3 and $package->status == 7) {
                    $i = 7;
                }

                Action::create([
                    'transport_id' => $transport->id,
                    'package_id' => $package->id,
                    'updated_by' => $updatedBy,
                    'updates' => [
                        'status' => $i,
                    ],
                    'note' => fake()->boolean(25)
                        ? fake()->paragraph(fake()->numberBetween(1, 3))
                        : null,
                ]);
            }
        }
    }
}
