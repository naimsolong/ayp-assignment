<?php

namespace App\Enums\Traits;

use ArchTech\Enums\{
    InvokableCases, From, Names, Values
};

trait Dropdown
{
    use InvokableCases, From, Names, Values;

    /**
     * Get data for dropdown <selectbox>
     */
    public static function dropdown(): array
    {
        $names = self::names();

        return collect($names)->transform(function ($item, $key) {
            return [
                'value' => self::$item(),
                'text' => self::tryFrom(self::$item())->description(),
            ];
        })->toArray();
    }
}