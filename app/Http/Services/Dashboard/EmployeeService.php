<?php

namespace App\Http\Services\Dashboard;

use App\Models\Employee;

class EmployeeService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Employee() );
    }

    /**
     * @param $data
     */
    public function store($data){

        $employee = Employee::create($data);
        $rolesAndDefaultOne = array_merge( $data['roles'] , [ "2" ] );
        $employee->roles()->attach( $rolesAndDefaultOne );
    }

    /**
     * @param $employee
     * @param $data
     */
    public function update($employee,$data){
        $employee->update($data);
        $rolesAndDefaultOne = array_merge($data['roles'] , [ "2" ] );

        $employee->roles()->sync( $rolesAndDefaultOne );
    }

    /**
     * @param $employee
     */
    public function delete($employee){
        $employee->delete();
    }

    /**
     * @param $data
     */
    public function updateProfile($data){
        auth('employee')->user()->update($data);
    }

}
