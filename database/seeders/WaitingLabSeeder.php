<?php

namespace Database\Seeders;

use App\Models\WaitingLab;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WaitingLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $waitingLab = [
            [
                'patient_id'            => 1, // 1 just
                'main_analysis_id'      => 1, // 1 just
                'invoice_id'            => 1, // 1 to 10
                'hospital_id'           => null, // 1 to 10
                'result'                => 1, // 1 to 3
                'status'                => 1, // 1 or 2 or 3 or 4
                'report'                => null, // 1 to 27
                'cultivation'           => null,
                'growth_status'         => null,
                'high_sensitive_to'     => null,
                'moderate_sensitive_to' => null,
                'resistant_to'          => null,
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
        ];

        WaitingLab::insert($waitingLab);
    }
}
