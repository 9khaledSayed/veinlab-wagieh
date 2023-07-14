<?php

namespace App\Http\Services\Dashboard;

use App\Models\AllowanceType;

class AllowanceTypeService
{

    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new AllowanceType() );
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return AllowanceType::get();
    }

    /**
     * @param $data
     */
    public function store($data){
        AllowanceType::create($data);
    }

    /**
     * @param $data
     * @param $allowanceType
     */
    public function update($data,$allowanceType){
        if(is_numeric($allowanceType)){
            $allowanceType = AllowanceType::finOrFail($allowanceType);
        }
        $allowanceType->update($data);
    }

    /**
     * @param $allowanceType
     */
    public function destroy($allowanceType){
        if (is_numeric($allowanceType)) {
            $allowanceType = AllowanceType::finOrFail($allowanceType);
        }
        $allowanceType->delete();
    }
}
