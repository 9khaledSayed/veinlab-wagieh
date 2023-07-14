<?php

namespace Database\Seeders;


use App\Models\Ability;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories  =
        [
            'employees',
            'roles',
            'settings',
            'recycle_bin',
            'reports',
            'patients',
            'home_visits',
            'doctors',
            'hospitals',
            'packages',
            'insurance_companies',
            'sectors',
            'marketers',
            'main_analysis',
            'sub_analysis',
            'promo_code',
            'affiliate',
            'nationalities',
            'branches',
            'vacation_types',
            'allowance_types',
            'deduction_and_additions',
            'waiting_labs',
            'results',
            'invoices',
            'promo_code',
            'laboratories'
        ];

        $affiliateActions =
            [
                'settings'
            ];

        $actions =
        [
            'view',
            'show',
            'create',
            'update',
            'delete',
        ];

        // indices of unused actions from the above array
        $exceptions = [
            'recycle_bin'          => [ 'unused_actions' => [ 1,2,3 ]       , 'extra_actions' => ['restore'] ],
            'patients'             => [  'extra_actions' => ['export_excel'] ],
            'home_visits'          => [  'extra_actions' => ['export_excel'] ],
            'insurance_companies'  => [  'extra_actions' => ['export_excel'] ],
            'main_analysis'        => [  'extra_actions' => ['export_excel'] ],
            'sub_analysis'         => [  'extra_actions' => ['export_excel'] ],
            'results'              => [  'extra_actions' => ['print_result'] ],
            'results'              => [  'extra_actions' => ['disaprove_result'] ],

        ];


        foreach ($categories as $category)
        {
            $usedActions = array_merge( $actions , $exceptions[ $category]['extra_actions'] ?? [] );

            foreach ( $exceptions[ $category]['unused_actions'] ?? [] as $index ) // remove the unused actions
                unset( $usedActions[$index]);

            if ($category == 'affiliate'){
                foreach ( $affiliateActions as $action)
                {
                    Ability::create([
                        'name'     => $action . '_' . str_replace(' ','_',$category),
                        'category' => $category,
                        'action'   => $action,
                    ]);
                }
            }

            foreach ( array_values($usedActions) as $action)
            {
                Ability::create([
                    'name'     => $action . '_' . str_replace(' ','_',$category),
                    'category' => $category,
                    'action'   => $action,
                ]);
            }
        }


        $superAdminRole = Role::create([
            'name_ar' => 'مدير تنفيذي',
            'name_en' => 'super admin',
        ]);


        $employeeRole  = Role::create([
            'name_ar'    => 'صلاحيات إفتراضية',
            'name_en'    => 'default roles',
        ]);

        $marketerRole  = Role::create([
            'name_ar'    => 'صلاحيات المسوق',
            'name_en'    => 'marketer roles',
        ]);


        $superAdminAbilitiesIds = Ability::pluck('id');

        $employeeAbilitiesIds   = Ability::whereIn('category',[ 'cars' , 'brands' , 'models' , 'colors' ] )->whereIn('action' , ['view' , 'show'])->get();

        $superAdminRole->abilities()->attach( $superAdminAbilitiesIds );
        $employeeRole->abilities()->attach( $employeeAbilitiesIds );


        Employee::find(1)->assignRole($superAdminRole);
        Employee::find(1)->assignRole($employeeRole);
        Employee::find(2)->assignRole($superAdminRole);
        Employee::find(2)->assignRole($employeeRole);

    }
}
