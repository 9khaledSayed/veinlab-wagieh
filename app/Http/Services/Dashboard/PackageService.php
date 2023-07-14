<?php

namespace App\Http\Services\Dashboard;

use Carbon\Carbon;
use App\Models\Package;

use function PHPUnit\Framework\isEmpty;

class PackageService
{
    /**
     * @return array
     */
    public function index(){
        return getModelData( model: new Package(), relations:[ 'mainAnalysis' => ['id','general_name']]);
    }

    /**
     * @return array
     */
    public function seasonalPackages(){
        return getModelData( model: new Package(), andsFilters: [['from_date', '!=', request()->from_date]], relations: ['mainAnalysis' => ['id','general_name']]);
    }

    /**
     * @param $data
     */
    public function store($data){
        $mainAnalysisIds = $data['main_analysis_id'];
        unset($data['main_analysis_id']);
        $package = Package::create($data);
        $package->mainAnalysis()->attach($mainAnalysisIds);
    }

    /**
     * @param $package
     * @return mixed
     */
    public function mainAnalysisSelect($package){
        if(is_numeric($package)){
            $package = Package::find($package);
        }
        return $package->mainAnalysis->pluck('id')->toArray();
    }

    /**
     * @param $package
     * @param $data
     */
    public function update($package,$data){
        $mainAnalysisIds = $data['main_analysis_id'];
        unset($data['main_analysis_id']);
        $package->update($data);
        $package->mainAnalysis()->sync($mainAnalysisIds);
    }

    /**
     * @param $package
     */
    public function destroy($package){
        if(is_numeric($package)){
            $package = Package::find($package);
        }
        $package->delete();
    }

    /**
     * @return mixed
     */
    public function getAll() {
        return Package::active()
            ->where('from_date', '<=', Carbon::now())
            ->where('to_date', '>=', Carbon::now())
            ->Orwhere('from_date', null)
            ->Orwhere('to_date', null)
            ->get();
    }
}
