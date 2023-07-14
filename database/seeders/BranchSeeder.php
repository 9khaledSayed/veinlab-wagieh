<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
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
            Branch::create([
                'name' => $faker->name,
                'address' => $faker->address
            ]);
        }
    }
}
