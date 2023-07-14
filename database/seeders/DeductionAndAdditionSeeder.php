<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeductionAndAddition;
use App\Enums\DeductionAndAdditionTypes;

class DeductionAndAdditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        $type = collect(DeductionAndAdditionTypes::cases())->toArray();
        for($i=0;$i<10;$i++){
            shuffle($type);
            DeductionAndAddition::create([
                'name_ar' => $faker->name,
                'name_en' => $faker->name,
                'type' => $type[0],
            ]);
        }
    }
}
