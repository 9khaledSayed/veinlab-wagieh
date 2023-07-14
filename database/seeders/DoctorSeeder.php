<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        for($i=0; $i < 10 ;$i++){
            Doctor::create([
                'name' => $faker->name,
                'phone' => '050000000'.$i,
                'email' => $faker->email,
                'percentage' => rand(1,99),
            ]);
        }
    }
}
