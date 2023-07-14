<?php

namespace App\Enums;

enum PointTypes : string
{
    case GAIN = 'Gain';
    case AFFILIATE = 'Affiliate';
    case USED = 'Used';
    case TRANSFER_TO = 'Transfer to';
    case TRANSFER_FROM = 'Transfer from';
    case WITHDRAW = 'Withdraw';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
