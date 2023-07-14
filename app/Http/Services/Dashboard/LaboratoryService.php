<?php

namespace App\Http\Services\Dashboard;

use App\Models\Laboratory;

class LaboratoryService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Laboratory() );
    }

    /**
     * @return Laboratory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Laboratory::all();
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data){
        $mainAnalyses = [];
        if (array_key_exists('main_analysis', $data)){
            $mainAnalyses = $data['main_analysis'];
            unset($data['main_analysis']);
        }

        $laboratory = Laboratory::create($data);
        foreach ($mainAnalyses as $mainAnalysis) {
            $laboratory->mainAnalysis()->attach(
                $mainAnalysis['id'],
                [
                    'selling_price' => $mainAnalysis['selling_price'],
                    'cost_price'    => $mainAnalysis['cost_price']
                ]
            );
        }
        return true;
    }

    /**
     * @param $laboratory
     * @param $data
     */
    public function update($data, $laboratory){

        $mainAnalyses = [];
        if (array_key_exists('main_analysis', $data)){
            $mainAnalyses = $data['main_analysis'];
            unset($data['main_analysis']);
        }

        $laboratory->update($data);
        $laboratory->mainAnalysis()->detach();
        foreach ($mainAnalyses as $mainAnalysis) {
            $laboratory->mainAnalysis()->attach(
                $mainAnalysis['id'],
                [
                    'selling_price' => $mainAnalysis['selling_price'],
                    'cost_price'    => $mainAnalysis['cost_price']
                ]
            );
        }
    }

    /**
     * @param $laboratory
     */
    public function delete($laboratory){
        $laboratory->delete();
    }

    public function getMainAnalysis(Laboratory $laboratory)
    {
        return $laboratory->mainAnalysis->map(function ($main){
            return [
                'id' => $main->id,
                'selling_price' => $main->pivot->selling_price,
                'cost_price' => $main->pivot->cost_price,
            ];
        });
    }
}
