<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Note;
use Carbon\Carbon;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $results = [
            [
                'main_analysis_id'      => 1, // 1 just
                'waiting_lab_id'        => 1, // 1 to 10
                'lab_notes'             =>'<p>all result is good </p>',
                'created_at'            => Carbon::now(),
                'updated_at'            => Carbon::now()
            ],
        ];

    }
}
