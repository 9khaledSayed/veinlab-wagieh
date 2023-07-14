<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
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
            Sector::create([
                'name' => $faker->name,
                'percentage' => rand(1,99),
                'logo' => 'default.jpg'
            ]);
        }
    }
}
