<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
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
            Laboratory::create([
               'name' => $faker->realTextBetween(15,20),
               'phone' => $faker->phoneNumber,
               'email' => $faker->email,
               'password' => bcrypt('123456789'),
               'address' => $faker->address
            ]);
        }
    }
}
