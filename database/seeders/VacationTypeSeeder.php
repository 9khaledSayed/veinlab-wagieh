<?php

namespace Database\Seeders;

use App\Models\VacationType;
use Illuminate\Database\Seeder;

class VacationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        for($i=0;$i<10;$i++){
            VacationType::create([
                'name' => $faker->name,
                'number_of_days' => rand(1,30),
            ]);
        }
    }
}
