<?php

namespace App\Http\Services\Dashboard;

use App\Models\Doctor;
use phpDocumentor\Reflection\PseudoTypes\Numeric_;


class DoctorServices
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Doctor() );
    }

    /**
     * @param $response
     * @return mixed
     */
    public function store($response)
    {
        $response['signature'] = uploadImage($response['signature'] ,"Doctors");
        return Doctor::create($response);
    }

    /**
     * @param $data
     * @param $doctor
     * @return bool
     */
    public function update($data, $doctor) : bool
    {
        if(is_numeric($doctor)){
            $doctor = $this->getModelById($doctor);
        }

        if(isset($data['signature']) && is_file($data['signature'])){
            $data['signature'] = uploadImage( $data['signature'] ,"Doctors");
        } else {
            $data['signature'] = $doctor->signature;
        }

        return $doctor->update($data);
    }

    /**
     * @param $doctor
     */
    public function delete($doctor) : void
    {
        if(is_numeric($doctor)){
            $doctor = $this->getModelById($doctor);
        }

        $doctor->delete();
    }

    /**
     * @param Numeric_ $doctor
     * @return Doctor
     */
    public function getModelById(Numeric_ $doctor) : Doctor
    {
        return Doctor::findOrFail($doctor);
    }

    public function getAll(){
        return Doctor::get();
    }

}
