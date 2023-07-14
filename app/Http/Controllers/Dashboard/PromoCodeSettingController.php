<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\PromoCodeTypes;
use App\Http\Classes\PromoCode\{PromoCodeFactory, PromoCodeInterface};
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PromoCode\StoreSetingsRequest;
use App\Models\PromoCodeSetting;

class PromoCodeSettingController extends Controller
{
    public PromoCodeInterface $promoCode;
    public function __construct()
    {
        $this->promoCode = PromoCodeFactory::getInstance()->getPromoInstance(((int) request()->type) ?? 0);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function updateSettings()
    {
        $promoCodeSettings = PromoCodeSetting::where('promo_code_id', null)->take(3)->get();
        $dataCollect = collect();
        foreach ($promoCodeSettings as $promoCodeSetting) {
            $points_calc = $promoCodeSetting->only('num_points', 'eq_value', 'id', 'promo_type');
            //user earning
            $userEarningTitle = 'User earning';
            $userEarning = $promoCodeSetting->only('user_earning', 'user_earning_type');

            switch ($promoCodeSetting->promo_type) {
                case PromoCodeTypes::VEIN_LAB:
                    $dataCollect[] = [PromoCodeTypes::VEIN_LAB->getName() => array_merge([$userEarningTitle => $userEarning], $points_calc)];
                    break;

                case PromoCodeTypes::AFFILIATE:
                case PromoCodeTypes::USER:

                $affiliateEarning =$this->affiliateEarning($promoCodeSetting, $promoCodeSetting->promo_type);
                $earnings = array_merge([$userEarningTitle => $userEarning], ['Affiliate earning' => $affiliateEarning]);
                $dataCollect[] = [$promoCodeSetting->promo_type->getName() => array_merge($earnings, $points_calc)];
                break;
                default:
                    break;
            }
        }
        unset($promoCodeSettings);


        return view('dashboard.promo_code.settings', compact('dataCollect'));
    }

    /**
     * @param StoreSetingsRequest $request
     * @param int                 $type
     */
    public function editSettings(StoreSetingsRequest $request, int $type)
    {
        $this->promoCode->setSetting($request->validated());
    }

    /**
     * @param mixed          $promoCodeSetting
     * @param PromoCodeTypes $codeTypes
     * @return array
     */
    public function affiliateEarning(mixed $promoCodeSetting, PromoCodeTypes $codeTypes): array
    {
        $affiliateEarning = $promoCodeSetting->only('affiliate_earning', 'affiliate_earning_type');
        return $affiliateEarning;
    }
}
