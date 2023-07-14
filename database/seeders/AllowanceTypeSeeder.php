<?php

namespace Database\Seeders;

use App\Enums\AllowanceTypes;
use App\Models\AllowanceType;
use Illuminate\Database\Seeder;
class AllowanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        $type = collect(AllowanceTypes::cases())->toArray();
        for($i=0;$i<10;$i++){
            shuffle($type);
            AllowanceType::create([
                'name' => $faker->name,
                'type' => $type[0],
                'amount' => rand(100,10000),
                'percentage' => rand(1,100),
            ]);
        }
    }
}
