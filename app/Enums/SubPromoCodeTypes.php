<?php

namespace App\Enums;

enum SubPromoCodeTypes : int
{
    case INVOICE = 0;

    case ANALYSE = 1;

    /**
     * @return string
     */
    public function getName(): string
    {
        return ucfirst(strtolower( $this->name));
    }
}
