<?php

namespace App\Enums;

enum PromoCodeTypes: int
{
    case VEIN_LAB = 0;
    case AFFILIATE = 1;
    case USER = 2;

    /**
     * @return string
     */
    public function getName(): string
    {
        return ucfirst(strtolower(str_replace('_', ' ', $this->name)));
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}
