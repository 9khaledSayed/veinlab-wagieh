<?php

namespace App\Enums;

enum PaymentMethod : int
{
    case CASH = 1;
    case CREDIT = 2;
    case OVERDUE = 3;

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
