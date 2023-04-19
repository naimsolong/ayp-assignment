<?php

namespace App\Enums;

use App\Enums\Traits\Dropdown;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Meta\Meta;
use App\Enums\MetaProperties\Description;

#[Meta([Description::class])]
enum ClaimTypeEnum: string
{
    use Metadata, Dropdown;

    #[Description('Parking')]
    case PARKING = 'P';
    
    #[Description('Fuel')]
    case FUEL = 'F';
    
    #[Description('Eatery')]
    case EATERY = 'E';
    
    #[Description('Medical')]
    case MEDICAL = 'M';
}