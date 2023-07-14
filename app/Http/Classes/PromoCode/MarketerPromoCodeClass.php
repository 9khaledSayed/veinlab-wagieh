<?php

namespace App\Http\Classes\PromoCode;

use App\Enums\{PromoCodePriorities, PromoCodeTypes};
use App\Models\{PromoCode, PromoCodeSetting};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MarketerPromoCodeClass implements PromoCodeInterface
{


    public function createPromoCode(array $data): bool
    {
        $ranges = explode(' - ', $data['ranges']);
        unset($data['ranges']);
        $data['from'] = Carbon::parse($ranges[0])->format('Y-m-d H:i:s');
        $data['to'] = Carbon::parse($ranges[1])->format('Y-m-d H:i:s');
        $data['type'] = 2;
        $data['uuid'] = Str::uuid();
        $data['include'] = 1;
        PromoCode::create($data);
        return true;
    }

    public function deActivePromoCode(Model $model): bool
    {
        // TODO: Implement deActivePromoCode() method.
    }

    public function getAll(): array
    {

        return getModelData(
            model: new PromoCode(),
            andsFilters: [['type', PromoCodeTypes::AFFILIATE->getValue()], ['marketer_id', '!=', null]],
            relations: ['marketer' => ['id', 'name']],
            searchingColumns: ['marketer.name']

        );

    }

    public function update(mixed $data, Model $model): bool
    {
        // TODO: Implement update() method.
    }

    public function destroy(Model $model): bool
    {
        // TODO: Implement destroy() method.
    }

    public function setSetting(array $data)
    {
        $promoCodeSetting = PromoCodeSetting::where('promo_type', PromoCodeTypes::AFFILIATE->getValue())->where('promo_code_id', null)->first();
        $promoCodeSetting->update($data);
    }

    public function setPromoCodeSetting(array $data, PromoCode $promoCode): bool
    {
        $data = [
            'affiliate_earning' => array_key_exists( 'affiliate_earning', $data) ? $data['affiliate_earning'] : null,
            'affiliate_earning_p' => PromoCodePriorities::HIGH,
            'affiliate_earning_type' => array_key_exists( 'affiliate_earning_type', $data) ? $data['affiliate_earning_type'] : null,
            'user_earning' => array_key_exists( 'user_earning', $data) ? $data['user_earning'] : null,
            'user_earning_p' => PromoCodePriorities::HIGH,
            'user_earning_type' => array_key_exists( 'user_earning_type', $data) ? $data['user_earning_type'] : null,
            'num_points' => array_key_exists( 'num_points', $data) ? $data['num_points'] : null,
            'eq_value' => array_key_exists( 'eq_value', $data) ? $data['eq_value'] : null,
            'promo_type' => PromoCodeTypes::USER,
        ];
        $setting = $promoCode->setting;
            $setting?->update($data) ?? $promoCode->setting()->create($data);
        return true;

    }

    public function getPromoSettingsWithDefault(PromoCode $promoCode = null): PromoCodeSetting
    {
        $setting = $promoCode->setting;

        $defaultSetting = PromoCodeSetting::where('promo_type', PromoCodeTypes::AFFILIATE->getValue())->where('promo_code_id', null)->first();

        if ($setting == null){
            $setting = $defaultSetting;
        }else {
            if ($setting->affiliate_earning == null){
                $setting->affiliate_earning = $defaultSetting->affiliate_earning;
                $setting->affiliate_earning_type = $defaultSetting->affiliate_earning_type;
            }
            if ($setting->user_earning == null){
                $setting->user_earning = $defaultSetting->user_earning;
                $setting->user_earning_type = $defaultSetting->user_earning_type;
            }
            if ($setting->num_points == null){
                $setting->num_points = $defaultSetting->num_points;
            }
            if ($setting->eq_value == null){
                $setting->eq_value = $defaultSetting->eq_value;
            }
        }
        return $setting;

    }
}
