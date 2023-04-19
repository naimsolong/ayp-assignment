<?php

use App\Enums\ClaimTypeEnum;

test('ClaimTypeEnum enum class return correct value', function () {
    expect(ClaimTypeEnum::values())->toBeArray()->toHaveCount(4);

    expect(ClaimTypeEnum::PARKING->value)->toBeString()->toBe('P');
    expect(ClaimTypeEnum::FUEL->value)->toBeString()->toBe('F');
    expect(ClaimTypeEnum::EATERY->value)->toBeString()->toBe('E');
    expect(ClaimTypeEnum::MEDICAL->value)->toBeString()->toBe('M');

    expect(ClaimTypeEnum::PARKING->description())->toBeString()->toBe('Parking');
    expect(ClaimTypeEnum::FUEL->description())->toBeString()->toBe('Fuel');
    expect(ClaimTypeEnum::EATERY->description())->toBeString()->toBe('Eatery');
    expect(ClaimTypeEnum::MEDICAL->description())->toBeString()->toBe('Medical');

    expect(ClaimTypeEnum::dropdown())->toBeArray()->toHaveCount(4)->toBe([
        [
          "value" => "P",
          "text" => "Parking",
        ],
        [
          "value" => "F",
          "text" => "Fuel",
        ],
        [
          "value" => "E",
          "text" => "Eatery",
        ],
        [
          "value" => "M",
          "text" => "Medical",
        ],
    ]);
});
