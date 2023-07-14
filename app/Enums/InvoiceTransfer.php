<?php

namespace App\Enums;


enum InvoiceTransfer : int
{
    case REGULAR = 1;
    case HOSPITAL = 3;
    case DOCTOR = 4;
    case SECTOR = 5;


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
    public function getName(): string
    {
        return __('view.transfer_enum.'. $this->name);
    }


}
