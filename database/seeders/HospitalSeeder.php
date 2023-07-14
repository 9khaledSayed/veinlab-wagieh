<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;
use App\Models\MainAnalysis;
use Illuminate\Support\Facades\Hash;

class HospitalSeeder extends Seeder
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
            $hospital = Hospital::create([
                'name' => $faker->name,
                'phone' => '050000000'.$i,
                'email' => $faker->email(),
                'password' => Hash::make(123123),
            ]);
            $mainAnalysis = MainAnalysis::select('id')->inRandomOrder()->limit(2)->get();
            foreach($mainAnalysis as $analysis){
                $hospital->mainAnalysis()->attach($analysis['id'] , ['price' => rand(50,10000)]);
            }
        }
    }
}
