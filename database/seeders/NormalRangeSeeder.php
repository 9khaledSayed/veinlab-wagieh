<?php

namespace Database\Seeders;

use App\Models\NormalRange;
use App\Models\SubAnalysis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NormalRangeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        $type = [
            'string',
            'select',
            'color',
        ];
        $gender = [
            'male',
            'female',
            'child',
        ];
        $value = [
            ['Lorem ipsum, or lipsum as it is sometimes known,','Lorem ipsum, or lipsum as it is sometimes known,'],
            ['negative','positive'],
            ['#000000','#ffffff'],
        ];

        function shuffle_recursive(&$array)
        {
            shuffle($array);
            foreach($array as &$arr)
            {
                if(gettype($arr) == "array") {
                    shuffle_recursive($arr);
                }
            }

        }
        for($i = 1; $i < 60; $i++){
            shuffle($type);
            shuffle($gender);
            shuffle_recursive($value);
            $normalRange = [
                [
                    'sub_analysis_id' => $faker->numberBetween(1,SubAnalysis::count()),
                    'from'            => $faker->numberBetween(1,19),
                    'to'              => $faker->numberBetween(19,90),
                    'gender'          => $gender[0],
                    'type'            => $type[0],
                    'value'           => $value[0][0],
                    'created_at'      => Carbon::now(),
                    'updated_at'      => Carbon::now()
                ],
            ];

            NormalRange::insert($normalRange);
        }
    }
}
