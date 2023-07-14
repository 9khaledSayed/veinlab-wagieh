<?php

namespace App\Enums;

enum PromoCodePriorities : string
{
    case HIGH = '50';
    case MEDIUM = '30';
    case LOW = '10';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
