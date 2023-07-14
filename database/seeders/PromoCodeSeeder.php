<?php

namespace Database\Seeders;

use App\Models\PromoCode;
use Illuminate\Database\Seeder;

class PromoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promo_codes = [
            //main analyse promocode
            [
                'marketer_id' => null,
                'main_analysis_id' => 1,
                'code' => 'NM36',
                'percentage' => '20',
                'type' => '0',
                'include' => '2',
                'from' => '2022-09-15 11:43:11',
                'to' => '2023-09-12 23:00:00',
                'created_at' => '2021-08-29 08:23:55',
                'updated_at' => '2021-09-15 11:43:11'
            ],
                ///marketer promocode
            [
                'marketer_id' => 1,
                'main_analysis_id' => NULL,
                'code' => 'Test10',
                'percentage' => '10',
                'type' => '1',
                'include' => '2',  // 1 all 2 individual 3 contract
                'from' => '2021-09-15 11:43:11',
                'to' => '2021-09-12 23:00:00',
                'created_at' => '2021-08-29 08:23:55',
                'updated_at' => '2021-09-15 11:43:11'
            ]
        ];
        PromoCode::insert($promo_codes);
    }
}
