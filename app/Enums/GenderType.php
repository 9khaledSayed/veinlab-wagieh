<?php

namespace App\Enums;


enum GenderType:string{

    case MALE   = 'male';
    case FEMALE = 'female';
    case CHILD = 'child';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    
}


