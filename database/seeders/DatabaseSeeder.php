<?php

namespace Database\Seeders;

use App\Models\VacationType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            NationalitiesSeeder::class,
            PatientSeeder::class,
            MainAnalysisSeeder::class,
            PackageSeeder::class,
            DoctorSeeder::class,
            HospitalSeeder::class,
            InsuranceCompanySeeder::class,
            HomeVisitSeeder::class,
            SectorSeeder::class,
            BranchSeeder::class,
            VacationTypeSeeder::class,
            AllowanceTypeSeeder::class,
            DeductionAndAdditionSeeder::class,
            MarketerSeeder::class,
            PromoCodeSeeder::class,
            PromCodeSettingSeeder::class,
            InvoiceSeeder::class,
            WaitingLabSeeder::class,
            ResultSeeder::class,
            NoteSeeder::class,
            NormalRangeSeeder::class,
            LaboratorySeeder::class,
        ]);
    }
}
