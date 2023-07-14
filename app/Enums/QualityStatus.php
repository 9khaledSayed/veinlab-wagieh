<?php

namespace App\Enums;

enum QualityStatus: int
{
    case Issuing_Invoice = 1;
    case Sample_Entry = 2;
    case Entering_Sample_Into_Laboratory = 3;
    case Issuing_Result = 4;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
