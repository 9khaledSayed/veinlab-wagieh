<?php

namespace App\Enums;

enum PaymentType : int
{
    case TAMARA = 1;
    case TAP    = 2;
    case MADA   = 3;

    public function getName(): string
    {
        return ucfirst(strtolower( $this->name ));
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
