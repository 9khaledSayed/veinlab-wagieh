<?php

namespace App\Http\Services\Dashboard;

use App\Models\WaitingLab;
use Illuminate\Database\Eloquent\Builder;


class WaitingLabService
{

    /**
     * @param $request
     * @return array
     */
    public function index($request)
    {
        if($request->patient != "null"){
            return getModelData(
                model: new WaitingLab(),
                orsFilters: [['result',1],['result',2]],
                andsFilters: ['patient_id' => $request->patient],
                relations: ['patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                searchingColumns: ['result','patients.name'],
                Between: ['created_at' ,$request->from_date ,$request->to_date]);
        }else{
            return getModelData(
                model: new WaitingLab(),
                orsFilters: [['result',1],['result',2]],
                relations: ['patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                group: 'patient_id', Between: ['created_at',$request->from_date ,$request->to_date]
            );
        }

    }

    /**
     * @param $request
     * @return array
     */
    public function finished($request)
    {

        if($request->patient != "null"){
            return getModelData(
                 model: new WaitingLab(),  andsFilters: ['status' => $request->status, 'result'=> 2 ,'patient_id' => $request->patient],
                 relations: [ 'patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                 Between:['created_at',$request->from_date ,$request->to_date]
                );
        }else{
            return getModelData(
                model: new WaitingLab(), andsFilters: ['status' => 2,'result'=>2 ],
                relations: [ 'patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                Between:['created_at',$request->from_date ,$request->to_date],group:'patient_id'
            );
        }
    }

    /**
     * @param $request
     * @return array
     */
    public function pending($request)
    {
        if($request->patient != "null" ){
            return getModelData(
                model: new WaitingLab(), andsFilters: ['status' => $request->status,'result'=>1  ,'patient_id' => $request->patient],
                relations: [ 'patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                Between:['created_at',$request->from_date ,$request->to_date]
            );
        }else{
            return getModelData(
                model: new WaitingLab(), andsFilters: ['status' => 1,'result'=>1 ],
                relations: [ 'patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
                group:'patient_id',Between:['created_at',$request->from_date ,$request->to_date]
            );
        }
    }

    /**
     * @param $request
     * @return array
     */
    public function WaitingLabArchives($request){
        return getModelData(
            model: new WaitingLab(), andsFilters: ['result' => 3],
            relations: [ 'patient' => ['id','name_ar'], 'mainAnalysis' => ['id','general_name'], 'invoice' => ['id','serial_no','barcode']],
            Between:['created_at',$request->from_date ,$request->to_date],group:'patient_id'
        );

    }


    public function store($data){
        WaitingLab::create($data);
    }

    public function update($data,$waitingLabService){
        if(is_numeric($waitingLabService)){
            $waitingLabService = WaitingLab::finOrFail($waitingLabService);
        }


        $waitingLabService->update($data);
    }

    public function destroy($waitingLabService){
        if (is_numeric($waitingLabService)) {
            $waitingLabService = WaitingLab::finOrFail($waitingLabService);
        }
        $waitingLabService->delete();
    }
}
