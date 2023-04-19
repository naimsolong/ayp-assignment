<?php

namespace Database\Factories;

use App\Enums\{
    ClaimStatusEnum, ClaimTypeEnum
};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Claim>
 */
class ClaimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $date = Carbon::create(fake()->dateTimeBetween('-2 month', 'now'));
        $status = collect(ClaimStatusEnum::values())->random();
        $submitted_at = null;
        $approved_at = null;
        $rejected_at = null;

        if($status == ClaimStatusEnum::DRAFT() && rand(0,1) == 1)
        {
            $submitted_at = $date->addDays(rand(1,5));
        }

        if($status == ClaimStatusEnum::APPROVED())
        {
            $submitted_at = $date->addDays(rand(1,5));
            $approved_at = $date->addDays(rand(1,5));
        }

        if($status == ClaimStatusEnum::REJECTED())
        {
            $submitted_at = $date->addDays(rand(1,5));
            $rejected_at = $date->addDays(rand(1,5));
        }

        return [
            'type' => collect(ClaimTypeEnum::values())->random(),
            'description' => fake()->paragraph(2),
            'date' => $date->format('Y-m-d'),
            'amount'=> rand(10,100),
            'status'=> $status,
            'submitted_at' => $submitted_at,
            'approved_at' => $approved_at,
            'rejected_at' => $rejected_at,
        ];
    }
}
