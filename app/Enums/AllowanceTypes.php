<?php

namespace App\Enums;

enum AllowanceTypes :string{
    case ADDITION = 'addition';
    case DEDUCTION = 'deduction';
}