<?php

namespace Database\Seeders;

use App\Enums\ClaimTypeEnum;
use App\Models\Claim;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Claim::factory()
            ->count(10)
            ->state(new Sequence(
                ['type' => ClaimTypeEnum::PARKING, 'description' => rand(0,1) == 1 ? '' : 'Parking at '.fake()->streetName()],
                ['type' => ClaimTypeEnum::FUEL, 'description' => rand(0,1) == 1 ? '' : 'Fuel tank at Petronas'],
                ['type' => ClaimTypeEnum::EATERY, 'description' => rand(0,1) == 1 ? '' : 'Eat at '.fake()->streetName()],
                ['type' => ClaimTypeEnum::MEDICAL, 'description' => rand(0,1) == 1 ? '' : 'Get medicine at '.fake()->streetName()],
            ))->create();
    }
}
