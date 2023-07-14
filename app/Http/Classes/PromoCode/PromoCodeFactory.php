<?php

namespace App\Http\Classes\PromoCode;

use App\Enums\PromoCodeTypes;
use phpDocumentor\Reflection\Types\This;

class PromoCodeFactory
{
    private static  $instance;
    private PromoCodeTypes $value;
    private function __construct()
    {
    }
    public static function  getInstance() : PromoCodeFactory{
        if (!isset(self::$instance) ){
            return self::$instance = new PromoCodeFactory();
        }else
            return self::$instance;
   }

    public function getPromoInstance( int $type = null) : PromoCodeInterface
    {

        $type = PromoCodeTypes::tryFrom($type);
        switch ($type){
            case PromoCodeTypes::VEIN_LAB:
                $this->value = PromoCodeTypes::VEIN_LAB;
                return new GeneralPromoCodeClass();

            case PromoCodeTypes::AFFILIATE:

                $this->value = PromoCodeTypes::AFFILIATE;
                return new MarketerPromoCodeClass();



            case PromoCodeTypes::USER:

                $this->value = PromoCodeTypes::USER;
                return new UserPromoCodeClass();


            default:
                abort(404);


        }

    }


    public function  getValue() : string
    {
        return  $this->value->name ?? PromoCodeTypes::VEIN_LAB->name;
    }

    public function  isMarketer() : bool
    {
        return  ($this->value ?? PromoCodeTypes::VEIN_LAB) == PromoCodeTypes::AFFILIATE;
    }

    public function  isUser() : bool
    {
        return  ($this->value ?? PromoCodeTypes::VEIN_LAB) == PromoCodeTypes::USER;
    }
   public function  isNotVeinLab() : bool
    {
        return  ($this->value ?? PromoCodeTypes::VEIN_LAB) != PromoCodeTypes::VEIN_LAB;
    }

}
