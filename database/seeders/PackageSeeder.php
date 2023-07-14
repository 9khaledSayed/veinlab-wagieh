<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name'       => 'الوقاية',
                'price'      => 550,
                'from_date'  => '2023-01-24',
                'to_date'    => '2023-03-24',
                'status'     => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name'       => 'باقة الروكتان',
                'price'      => 300,
                'from_date'  => '2023-03-24',
                'to_date'    => '2023-06-24',
                'status'     => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name'       => 'باقة هشاشة العظام',
                'price'      => 450,
                'from_date'  => '2023-01-24',
                'to_date'    => '2023-04-24',
                'status'     => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name'       => 'باقة الغدة الدرقية',
                'price'      => 400,
                'from_date'  => '2023-01-24',
                'to_date'    => '2023-09-24',
                'status'     => 'inactive',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name'       => 'باقة اللياقة البدنية',
                'price'      => 550,
                'from_date'  => '2023-02-24',
                'to_date'    => '2023-07-24',
                'status'     => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        Package::insert($packages);
        
        $package_main_analyze = [
            [
                'main_analysis_id' => '1',
                'package_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'main_analysis_id' => '1',
                'package_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'main_analysis_id' => '2',
                'package_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'main_analysis_id' => '3',
                'package_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'main_analysis_id' => '1',
                'package_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'main_analysis_id' => '3',
                'package_id' => '5',
                'created_at' => NULL,
                'updated_at' => NULL
            ]
        ];

        DB::table('package_main_analyze')->insert($package_main_analyze);
    }

}
