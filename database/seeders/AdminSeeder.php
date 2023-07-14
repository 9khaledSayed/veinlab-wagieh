<?php

namespace Database\Seeders;

use App\Enums\EmployeeType;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Type;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => 123123,
            'phone' => '1234567891',
        ]);

        Employee::create([
            'name' => 'employee',
            'email' => 'admin@example.com',
            'password' => 123123,
            'phone' => '1234567890',
        ]);

    }
}
