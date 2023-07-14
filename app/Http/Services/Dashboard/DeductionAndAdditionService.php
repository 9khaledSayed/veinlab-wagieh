<?php

namespace App\Http\Services\Dashboard;

use App\Models\DeductionAndAddition;

class DeductionAndAdditionService
{

    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new DeductionAndAddition() );
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return DeductionAndAddition::get();
    }

    /**
     * @param $data
     */
    public function store($data){
        DeductionAndAddition::create($data);
    }

    /**
     * @param $data
     * @param $deductionAndAddition
     */
    public function update($data,$deductionAndAddition){
        if(is_numeric($deductionAndAddition)){
            $deductionAndAddition = DeductionAndAddition::finOrFail($deductionAndAddition);
        }
        $deductionAndAddition->update($data);
    }

    /**
     * @param $deductionAndAddition
     */
    public function destroy($deductionAndAddition){
        if (is_numeric($deductionAndAddition)) {
            $deductionAndAddition = DeductionAndAddition::finOrFail($deductionAndAddition);
        }
        $deductionAndAddition->delete();
    }
}
