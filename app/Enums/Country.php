<?php

namespace App\Enums;

enum Country: string
{
    case MALAYSIA  = 'my'; // ISO 3166-1 alpha-2 code for Malaysia
    case INDONESIA = 'id'; // ISO 3166-1 alpha-2 code for Indonesia

    public function label(): string
    {
        return match ($this) {
            self::MALAYSIA  => 'Malaysia',
            self::INDONESIA => 'Indonesia',
        };
    }
}
