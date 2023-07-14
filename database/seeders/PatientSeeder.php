<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patients = array(
            array('id' => '1','name_ar' => 'محمد','name_en' => 'Mohamed','id_number' => '761','phone' => '01001292101','email' => 'mohamed@mailinator.com','password' => '$2y$10$bBxXwvHVExqy7LtAGAzLIeIQ3JWw3UdNyi1XgDVKeWLR1oinDiR.6','gender' => 'male','nationality_id' => '12','age' => '28-1-1430','city' => 'Cupidatat earum ut i','address' => 'Dolor distinctio Cu','diseases' => 'Maxime in itaque duc','visit_number' => NULL,'device_token' => NULL,'created_at' => '2023-01-16 20:58:30','updated_at' => '2023-01-16 20:58:30')
        );
        Patient::insert($patients);

    }
}
