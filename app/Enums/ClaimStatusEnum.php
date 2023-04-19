<?php

namespace App\Enums;

use App\Enums\Traits\Dropdown;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Meta\Meta;
use App\Enums\MetaProperties\Description;

#[Meta([Description::class])]
enum ClaimStatusEnum: string
{
    use Metadata, Dropdown;

    #[Description('Waiting for approval')]
    case DRAFT = 'D';

    #[Description('Approved')]
    case APPROVED = 'A';

    #[Description('Rejected')]
    case REJECTED = 'R';
}