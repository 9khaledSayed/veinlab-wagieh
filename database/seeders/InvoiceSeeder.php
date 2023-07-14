<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $invoices = [
            [
                'patient_id'     => 1, // 1 just
                'employee_id'    => 1, // 1 just
                'hospital_id'    => null, // 1 to 10
                'doctor_id'      => 1, // 1 to 10
                'promo_code_id'  => null, // 1 to 2
                'transfer'       => 1, // 1 or 2 or 3 or 4
                'main_analysis'  => 'a:1:{i:0;s:1:"2";}', // 1 to 27
                'packages'       => 'N;',
                'purchases'      => 'a:1:{s:3:"FT4";a:3:{s:5:"price";s:6:"195.00";s:4:"code";s:2:"T4";s:8:"discount";s:4:"0.00";}}',
                'total_price'    => 250,
                'total_cost'     => 190,
                'tax'            => '0.00',
                'discount'       => 0,
                'amount_paid'    => 300,
                'pay_method'     => 2,
                'serial_no'      => 167750670348,
                'policy_no'      => null,
                'barcode'        => 067032,
                'doctor'         => null,
                'approved'       => 0, // 0 or 1
                'approved_date'  => null,
                'result_created' => 0, // 0 or 1
                'status'         => 1, // 1 or 2
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        Invoice::insert($invoices);
    }
}
