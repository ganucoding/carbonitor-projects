<?php

namespace App\Enums;

enum RetirementStatus: string
{
    case ACTIVE         = 'active';
    case RETIRED        = 'retired';
    case PENDING        = 'pending';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE      => 'Active',
            self::RETIRED     => 'Retired',
            self::PENDING     => 'Pending',
        };
    }
}
