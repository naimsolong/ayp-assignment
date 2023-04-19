<?php

use App\Enums\ClaimStatusEnum;

test('ClaimStatusEnum enum class return correct value', function () {
    expect(ClaimStatusEnum::values())->toBeArray()->toHaveCount(3);

    expect(ClaimStatusEnum::DRAFT->value)->toBeString()->toBe('D');
    expect(ClaimStatusEnum::APPROVED->value)->toBeString()->toBe('A');
    expect(ClaimStatusEnum::REJECTED->value)->toBeString()->toBe('R');

    expect(ClaimStatusEnum::DRAFT->description())->toBeString()->toBe('Waiting for approval');
    expect(ClaimStatusEnum::APPROVED->description())->toBeString()->toBe('Approved');
    expect(ClaimStatusEnum::REJECTED->description())->toBeString()->toBe('Rejected');

    expect(ClaimStatusEnum::dropdown())->toBeArray()->toHaveCount(3)->toBe([
        [
          "value" => "D",
          "text" => "Waiting for approval",
        ],
        [
          "value" => "A",
          "text" => "Approved",
        ],
        [
          "value" => "R",
          "text" => "Rejected",
        ],
    ]);
});
