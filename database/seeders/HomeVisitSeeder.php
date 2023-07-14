<?php

namespace Database\Seeders;

use App\Models\HomeVisit;
use Illuminate\Database\Seeder;

class HomeVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        $gender = ['male','female','child'];
        for($i=0;$i<10;$i++){
            shuffle($gender);
            HomeVisit::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => '050000000'.$i,
                'email' => $faker->email,
                'gender' => $gender[0],
                'date_time' => now()->addDays($i),
            ]);
        }
    }
}
