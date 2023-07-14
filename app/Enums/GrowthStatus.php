<?php

namespace App\Enums;


enum GrowthStatus:string{

    case NOGROWTH  = 'no_growth';
    case GROWTH    = 'growth';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }


}
