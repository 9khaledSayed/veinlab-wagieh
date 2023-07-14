<?php

namespace App\Http\Services\Dashboard;

use App\Enums\{PromoCodePriorities, SubPromoCodeTypes};
use App\Http\Classes\PromoCode\{PromoCodeFactory, PromoCodeInterface};
use App\Models\{PromoCode, PromoCodeSetting};
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class PromoCodeService
{

    /**
     * PromoCodeService constructor.
     * @param PromoCodeInterface $promoCode
     */
    public function __construct(private PromoCodeInterface $promoCode)
    {

    }

    /**
     * @return array
     */
    public function index()
    {
        return $this->promoCode->getAll();

    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data): bool
    {

        $type = (int)$data['type'];
        $main_analysis_id = $data['main_analysis_id'];
        $discount = $data['discount'];
        $ranges = explode(' - ', $data['ranges']);
        $from = Carbon::parse($ranges[0])->format('Y-m-d H:i:s');
        $to = Carbon::parse($ranges[1])->format('Y-m-d H:i:s');
        $code = $data['code'];

        if ($from < today() || $to < today()) {
            throw ValidationException::withMessages(['ranges' => __('ranges must be starting from today')]);
        }


        // store
        $discountType = $data['discount_type'];
        $promoCode = PromoCode::create([
            'main_analysis_id' => $main_analysis_id,
            'discount_type' => $discountType,
            'percentage' => $this->_getDiscount($discountType, $discount, 'percentage'),
            'fixed_value' => $this->_getDiscount($discountType, $discount, 'fixed'),
            'code' => $code,
            'from' => $from,
            'to' => $to,
            'type' => $type,
            'sub_type' => SubPromoCodeTypes::tryFrom($data['sub_type'])->value,
            'include' => 1,// 1 all 2 individual 3 contract
            'marketer_id' => array_key_exists('marketer_id', $data) ? $data['marketer_id'] : null
        ]);

        // store custom affiliate if is marketer
        $this->storeCustomAffiliate($promoCode, $data);
        return true;

    }

    /**
     * @param string   $discountType
     * @param int|null $discount
     * @param string   $key
     * @return int|null
     */
    private function _getDiscount(string $discountType, int|null $discount, string $key): int|null
    {
        $percentage = 'percentage';
        $fixed = 'fixed';
        switch ($discountType) {
            case $percentage:
                return $key == $percentage ? $discount : null;

            case $fixed:
                return $key == $fixed ? $discount : null;

            default:
                break;
        }

        return null;
    }

    /**
     * @param PromoCode $promoCode
     * @param           $data
     * @return bool
     */
    private function storeCustomAffiliate(PromoCode $promoCode, $data): bool
    {

        if (PromoCodeFactory::getInstance()->isMarketer()) {
            if (isset($data['affiliate_earning']) && $data['affiliate_earning']) {
                $setting = new PromoCodeSetting([
                    'affiliate_earning' => $data['affiliate_earning'],
                    'affiliate_earning_type' => $data['affiliate_earning_type'],
                    'affiliate_earning_p' => PromoCodePriorities::HIGH
                ]);
                //todo submit setting
                $promoCode->setting()->save($setting);

            }
        }

        return false;
    }

    /**
     * @param           $data
     * @param PromoCode $promoCode
     */
    public function update($data, PromoCode $promoCode)
    {
        $main_analysis_id = $data['main_analysis_id'];
        $discount = null;
        if (array_key_exists('discount', $data) && $data['discount']){
            $discount = $data['discount'];
        }

        // in user promo code by default not set ranges
        if (array_key_exists('ranges', $data) && $data['ranges']){
            $ranges = explode(' - ', $data['ranges']);
            $from = Carbon::parse($ranges[0])->format('Y-m-d H:i:s');
            $to = Carbon::parse($ranges[1])->format('Y-m-d H:i:s');

            $now = Carbon::today();
            if ($from == $now && $to == $now) {
                $from = null;
                $to = null;
            }
        }else{
            $from = null;
            $to = null;
        }
        $code = $data['code'];

        // update only value can be changing
        $discountType = $data['discount_type'];
        $promoCode->update([
            'main_analysis_id' => $main_analysis_id,
            'discount_type' => $discountType,
            'percentage' => $this->_getDiscount($discountType, $discount, 'percentage'),
            'fixed_value' => $this->_getDiscount($discountType, $discount, 'fixed'),
            'code' => $code,
            'from' => $from,
            'to' => $to,
            'sub_type' => SubPromoCodeTypes::tryFrom($data['sub_type'])->value,
            'include' => 1,// 1 all 2 individual 3 contract
        ]);

        //set promo code setting if user add this setting
        $this->_setPromoCodeSetting($data, $promoCode);
    }

    /**
     * @param $promoCode
     */
    public function delete($promoCode){
        if(is_numeric($promoCode)){
            $promoCode = PromoCode::findOrFail($promoCode);
            $promoCode->delete();
        }else{
            $promoCode->delete();
        }
    }

    /**
     * @param int $model
     * @return PromoCode
     */
    public function getModelById(int $model, $with = []): mixed
    {
        return PromoCode::with('setting')->findOrFail($model);
    }

    /**
     *  update if user enter or recorde of setting founded in this record
     * @param $data
     * @param PromoCode $promoCode
     * @return void
     */
    private function _setPromoCodeSetting($data, PromoCode $promoCode) : void
    {
        if(array_key_exists('user_earning', $data) && $data['user_earning'] ||
            array_key_exists('num_points', $data) && $data['num_points'] ||
            array_key_exists('eq_value', $data) && $data['eq_value'] ||
            array_key_exists('affiliate_earning', $data) && $data['affiliate_earning']
        ){
            $this->promoCode->setPromoCodeSetting($data, $promoCode);
        }
    }
}
