<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Transport;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Administrator',
                'username' => 'admin',
                'auth_method' => 0,
                'is_admin' => 1,
            ]);

        User::factory()
            ->count(3)
            ->create([
                'is_admin' => 1,
            ]);

        User::factory()
            ->count(10)
            ->create();

        Transport::factory()
            ->count(50)
            ->create();

        Package::factory()
            ->count(500)
            ->create();

        $this->call([
            ActionSeeder::class,
        ]);
    }
}
