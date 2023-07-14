<?php

namespace App\Http\Services\Dashboard;

use App\Models\VacationType;

class VacationTypeService
{

    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new VacationType() );
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return VacationType::get();
    }

    /**
     * @param $data
     */
    public function store($data){
        VacationType::create($data);
    }

    /**
     * @param $data
     * @param $vacationType
     */
    public function update($data,$vacationType){
        if(is_numeric($vacationType)){
            $vacationType = VacationType::finOrFail($vacationType);
        }


        $vacationType->update($data);
    }

    /**
     * @param $vacationType
     */
    public function destroy($vacationType){
        if (is_numeric($vacationType)) {
            $vacationType = VacationType::finOrFail($vacationType);
        }
        $vacationType->delete();
    }
}
