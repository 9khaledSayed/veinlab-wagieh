<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyCategory;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_JO');
        for($i=0;$i<10;$i++)
        {
            $insuranceCompany = InsuranceCompany::create(['name'=> $faker->name]);
            for($j=0;$j<3;$j++)
            {
                InsuranceCompanyCategory::create([
                    'insurance_company_id' => $insuranceCompany->id,
                    'percentage' => rand(1,99),
                    'name' => $faker->name,
                ]);
            }
        }
    }
}
