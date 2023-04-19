<?php

namespace App\Enums\Traits;

use ArchTech\Enums\{
    Metadata, InvokableCases, Names, Values
};

trait Dropdown
{
    use InvokableCases, Names, Values;

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