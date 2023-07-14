<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;
use Carbon\Carbon;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //

         $results = [
            [
                'patient_id'            => 1, // 1 just
                'main_analysis_id'      => 1, // 1 just
                'waiting_lab_id'        => 1, // 1 to 10
                'sub_analysis_id'       => 1,
                'result'                => 1, // 1 to 3
                'classification'        => 'Macroscopic',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
        ];

        Result::insert($results);
    }
}
