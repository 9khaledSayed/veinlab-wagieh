<?php

namespace App\Enums;


enum BloodType:string{

    case A_PLLUS = 'A+';
    case B_PLLUS = 'B+';
    case AB_PLLUS = 'AB+';
    case O_PLLUS = 'O+';
    case A_MINUS = 'A-';
    case B_MINUS = 'B-';
    case AB_MINUS = 'AB-';
    case  O_MINUS = 'O-';
}