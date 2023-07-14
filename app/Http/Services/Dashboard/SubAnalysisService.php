<?php

namespace App\Http\Services\Dashboard;

use App\Models\SubAnalysis;


class SubAnalysisService
{
    /**
     * @return array
     */
    public function index(){
        return getModelData( model: new SubAnalysis(),
            relations:[ 'mainAnalysis' => ['id','general_name']],
            searchingColumns:['mainAnalysis.general_name','name', 'classification', 'unit']);
    }

    /**
     * @return SubAnalysis[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return SubAnalysis::all();
    }

    /**
     * @param $data
     */
    public function store($data){
        SubAnalysis::create($data);
    }

    /**
     * @param $data
     * @param $subAnalysis
     */
    public function update($data,$subAnalysis){
        if(is_numeric($subAnalysis)){
            $subAnalysis =  SubAnalysis::findOrFail($subAnalysis);
        }
        $subAnalysis->update($data);
    }

    /**
     * @param $subAnalysis
     * @return mixed
     */
    public function destroy($subAnalysis){
        if(is_numeric($subAnalysis)){
            $subAnalysis = SubAnalysis::findOrFail($subAnalysis);
        }
        return $subAnalysis->delete();
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel(){
        $mainAnalysis = SubAnalysis::get()->map(function($mainAnalysis){
           return [
                '#' => $mainAnalysis->id,
                __("Main analysis") => $mainAnalysis->general_name ,
                __("Name") => $mainAnalysis->abbreviated_name ,
                __("Classification") => $mainAnalysis->classification ,
                __("Unit") => $mainAnalysis->unit ,
                __("Created date") => $mainAnalysis->created_at ,
           ];
        });
     return (new \Rap2hpoutre\FastExcel\FastExcel($mainAnalysis))->download(__('Sub analysis').'.xlsx');
    }
}
