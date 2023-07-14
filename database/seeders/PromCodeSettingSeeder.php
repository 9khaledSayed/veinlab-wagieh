<?php

namespace Database\Seeders;

use App\Enums\PromoCodePriorities;
use App\Enums\PromoCodeTypes;
use App\Models\PromoCodeSetting;
use Illuminate\Database\Seeder;

class PromCodeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        dd(PromoCodeTypes::VEIN_LAB->value);
        $settings = [
            [
                'promo_code_id' => null,
                'affiliate_earning' => null,
                'affiliate_earning_p' => PromoCodePriorities::LOW->value,
                'affiliate_earning_type' => null,
                'user_earning' => 20,
                'user_earning_p' => PromoCodePriorities::MEDIUM->value,
                'user_earning_type' => 'fixed',
                'promo_type' => PromoCodeTypes::VEIN_LAB->getValue(),
                'num_points' => 1,
                'eq_value' => 1
            ],
            [
                'promo_code_id' => null,
                'affiliate_earning' => 15,
                'affiliate_earning_p' => PromoCodePriorities::MEDIUM->value,
                'affiliate_earning_type' => 'percentage',
                'user_earning' => 50,
                'user_earning_p' => PromoCodePriorities::MEDIUM->value,
                'user_earning_type' => 'fixed',
                'promo_type' => PromoCodeTypes::AFFILIATE->getValue(),
                'num_points' => 1,
                'eq_value' => 1
            ],

            [
                'promo_code_id' => null,
                'affiliate_earning' => 5,
                'affiliate_earning_p' => PromoCodePriorities::MEDIUM->value,
                'affiliate_earning_type' => 'percentage',
                'user_earning' => 20,
                'user_earning_p' => PromoCodePriorities::MEDIUM->value,
                'user_earning_type' => 'fixed',
                'promo_type' => PromoCodeTypes::USER->getValue(),
                'num_points' => 1,
                'eq_value' => 1
            ]

        ];
        PromoCodeSetting::insert($settings);


    }
}
