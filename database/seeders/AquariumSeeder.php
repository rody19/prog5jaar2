<?php

namespace Database\Seeders;

use App\Models\Aquarium;
use Illuminate\Database\Seeder;

class AquariumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aquarium::factory()
            ->times(3)
            ->create();
    }
}
