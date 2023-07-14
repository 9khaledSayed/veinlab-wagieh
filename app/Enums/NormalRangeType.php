<?php

namespace App\Enums;

enum NormalRangeType : string
{
    case STRING  = 'string';
    case SELECT  = 'select';
    case COLOR   = 'color';

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
