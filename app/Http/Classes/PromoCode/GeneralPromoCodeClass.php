<?php

namespace App\Http\Classes\PromoCode;

use App\Enums\{PromoCodePriorities, PromoCodeTypes};

use App\Models\{MainAnalysis, PromoCode, PromoCodeSetting};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GeneralPromoCodeClass implements PromoCodeInterface
{


    public function createPromoCode(array $data): bool
    {
        $type = $data['type'];
        $analysis = null;
//        $include = $data['include'];
        $main_analysis_id = $data['main_analysis_id'];
        $percentage = $data['percentage'];
        $ranges = explode(' - ', $data['ranges']);
        $from = Carbon::parse($ranges[0])->format('Y-m-d H:i:s');
        $to = Carbon::parse($ranges[1])->format('Y-m-d H:i:s');
        $code = $data['code'];

        // store
        PromoCode::create([
            'main_analysis_id' => $main_analysis_id,
            'percentage'      => $percentage,
            'code'            => $code,
            'from'            => $from,
            'to'              => $to,
            'type'            => $type,
            'include'         => $include??1   // 1 all 2 individual 3 contract
        ]);

//        $notification_type = $data->notify;
        //send notifications
        if(isset($main_analysis_id)){
            $analysis = MainAnalysis::find($main_analysis_id)->general_name;
        }

        //todo send the notification

        return true;
    }

    public function deActivePromoCode(Model $model): bool
    {
        // TODO: Implement deActivePromoCode() method.
    }

    public function getAll(): array
    {
        return getModelData(model: new PromoCode(), andsFilters: [['type', PromoCodeTypes::VEIN_LAB],['marketer_id' , '=',null]]);
    }

    public function update(mixed $data, Model $promoCode): bool
    {
        $type = $data['type'];
        $analysis = null;
        $include = $data['include'];
        $main_analysis_id = $data['main_analysis_id'];
        $percentage = $data['percentage'];
        $ranges = explode(' / ', $data['ranges']);
        $from = $ranges[0];
        $to = $ranges[1];
        $code = $data['code'];
        // store
        $promoCode->update([
            'main_analysis_id' => $main_analysis_id,
            'percentage'      => $percentage,
            'code'            => $code,
            'from'            => $from,
            'to'              => $to,
            'type'            => $type,
            'include'         => $include   // 1 all 2 individual 3 contract
        ]);

        $notification_type = $data->notify;
        //send notifications
        if(isset($main_analysis_id)){
            $analysis = MainAnalysis::find($main_analysis_id)->general_name;
        }
    }

    public function destroy(Model $model): bool
    {
        // TODO: Implement destroy() method.
    }

    public function setSetting(array $data)
    {
        $promoCodeSetting = PromoCodeSetting::where('promo_type', PromoCodeTypes::VEIN_LAB->getValue())->where('promo_code_id', null)->first();
        $promoCodeSetting->update($data);
    }

    public function setPromoCodeSetting(array $data, PromoCode $promoCode): bool
    {
//        dd(number_format((double) $data['eq_value'], 2, '.'));
        $data = [
//            'promo_code_id' => $promoCode->id,
            'user_earning' => array_key_exists( 'user_earning', $data) ? $data['user_earning'] : null,
            'user_earning_p' => PromoCodePriorities::HIGH,
            'user_earning_type' => array_key_exists( 'user_earning_type', $data) ? $data['user_earning_type'] : null,
            'num_points' => array_key_exists( 'num_points', $data) ? $data['num_points'] : null,
            'eq_value' => array_key_exists( 'eq_value', $data) ? (double) number_format((double) $data['eq_value'], 2, '.') : null,
            'promo_type' => PromoCodeTypes::USER,
        ];
        $setting = $promoCode->setting;
        $setting?->update($data) ?? $promoCode->setting()->create($data);
        return true;

    }

    public function getPromoSettingsWithDefault(PromoCode $promoCode = null): PromoCodeSetting
    {
        $setting = $promoCode->setting;
        $defaultSettings = PromoCodeSetting::where('promo_type', PromoCodeTypes::VEIN_LAB->getValue())->where('promo_code_id', null)->first();

        if ($setting == null){
            $setting = $defaultSettings;
        }else {
            $setting->affiliate_earning = null;
            if ($setting->user_earning == null){
                $setting->user_earning = $defaultSettings->user_earning;
                $setting->user_earning_type = $defaultSettings->user_earning_type;
            }
            if ($setting->num_points == null){
                $setting->num_points = $defaultSettings->num_points;
            }
            if ($setting->eq_value == null){
                $setting->eq_value = $defaultSettings->eq_value;
            }
        }
        return $setting;

    }
}
