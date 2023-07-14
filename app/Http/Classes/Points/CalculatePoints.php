<?php

namespace App\Http\Classes\Points;

use App\Http\Classes\PromoCode\PromoCodeFactory;
use App\Models\{PromoCode, PromoCodeSetting};

class CalculatePoints
{
    public function __construct(public PromoCode $promoCode)
    {
    }

    public function clc($total)
    {
        $setting = $this->getSettings();
        $points = new CustomPoints();

        $affiliateEarningType = $setting->affiliate_earning_type;
        $userEarningType = $setting->user_earning_type;

        if ($affiliateEarningType != null){
            if ($affiliateEarningType == 'percentage'){
                $points->marketerPoints = $total * ($setting->affiliate_earning / 100);
            }elseif ($affiliateEarningType == 'fixed'){
                $points->marketerPoints = $setting->affiliate_earning;

            }
        }

        if ($userEarningType != null){
            if ($userEarningType == 'percentage'){
                $points->userPoints = $total * ($setting->user_earning / 100);
            }elseif ($userEarningType == 'fixed'){
                $points->userPoints = $setting->user_earning;

            }
        }

        return $points;
    }

    /**
     * @return PromoCodeSetting
     */
    private function getSettings(): PromoCodeSetting
    {
        return (PromoCodeFactory::getInstance()->getPromoInstance($this->promoCode->type->value))->getPromoSettingsWithDefault($this->promoCode);
    }


}

