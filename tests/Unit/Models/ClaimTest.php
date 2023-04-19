<?php

use App\Enums\{
    ClaimStatusEnum, ClaimTypeEnum
};
use App\Models\Claim;
use Carbon\Carbon;

test('Claim model able to perform CRUD operation', function () {
    $claim = Claim::create([
        'type' => collect(ClaimTypeEnum::values())->random(),
        'description' => fake()->paragraph(2),
        'date' => now()->format('Y-m-d'),
        'status'=> collect(ClaimStatusEnum::values())->random(),
    ]);
    $this->assertModelExists($claim);

    $claim->update([
        'description' => fake()->paragraph(2)
    ]);
    $this->assertModelExists($claim);

    expect($claim->submitted_at)->toBeNull();
    $claim->submitted();
    expect($claim->submitted_at)->toBeInstanceOf(Carbon::class);

    expect($claim->approved_at)->toBeNull();
    $claim->approved();
    expect($claim->status)->toBe(ClaimStatusEnum::APPROVED);
    expect($claim->approved_at)->toBeInstanceOf(Carbon::class);

    expect($claim->rejected_at)->toBeNull();
    $claim->rejected();
    expect($claim->status)->toBe(ClaimStatusEnum::REJECTED);
    expect($claim->rejected_at)->toBeInstanceOf(Carbon::class);

    $claim->delete();
    $this->assertModelMissing($claim);
});
