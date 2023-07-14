<?php

namespace Database\Seeders;

use App\Models\Marketer;
use Illuminate\Database\Seeder;

class MarketerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marketers = array(
            array('id' => '1','name' => 'maketer1','email' => 'maketer1@test.com','phone' => '123213132','country' => 'egypt','city' => 'cairo','belong_to' => 'person','bank_account_title' => NULL,'bank_name' => NULL,'swift_code' => NULL,'bank_account_no' => NULL,'iban' => NULL,'bank_branch_code' => NULL,'created_at' => '2023-02-06 19:48:08','updated_at' => '2023-02-06 00:00:00')
        );

        Marketer::insert($marketers);
    }
}
