<?php

namespace App\Http\Services\Dashboard;

use App\Models\{MainAnalysis, NormalRange, SubAnalysis};

class MainAnalysisService
{

    /**
     * @return array
     */
    public function index(){
        return getModelData( model: new MainAnalysis());
    }

    /**
     * @return array
     */
    public function laboratories(){
        /** Get the request parameters **/
        $params = request()->all();

        /** Set the current page **/
        $page = $params['page'] ?? 1;

        /** Set the number of items per page **/
        $perPage = $params['per_page'] ?? 10;

        $model = \DB::table('laboratory_main_analysis')
            ->join('main_analysis', 'main_analysis.id', '=', 'laboratory_main_analysis.main_analysis_id')
            ->join('laboratories', 'laboratories.id', '=', 'laboratory_main_analysis.laboratory_id')
            ->groupBy(['main_analysis_id'])
            ->select('laboratory_main_analysis.*','main_analysis.general_name','laboratories.*');

        $response = [
            "recordsTotal"    => $model->count(),
            "recordsFiltered" => $model->count(),
            'data'            => $model->skip(($page - 1) * $perPage)->take($perPage)->get()
        ];

        return $response;
    }

    /**
     * @return MainAnalysis[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return MainAnalysis::all();
    }

    /**
     * @return mixed
     */
    public function getAllWithLaboratories() {
        return MainAnalysis::with('laboratories')->get();
    }

    /**
     * @param $data
     */
    public function store($data){
        $subAnalysis = [];
        if(array_key_exists('sub_analysis', $data)){
            $subAnalysis = $data['sub_analysis'];
            unset($data['sub_analysis']);
        }


        $mainAnalysis = MainAnalysis::create($data);
        if(is_array($subAnalysis) && count($subAnalysis) > 0){
            foreach($subAnalysis as $sub)
            {

                $sub['main_analysis_id'] = $mainAnalysis->id;
                $normalRanges = $sub['normal_range'];
                unset($sub['normal_range']);
                $subAnalysis = SubAnalysis::create($sub);
                if(is_array($normalRanges) && count($normalRanges) > 0){
                    foreach ($normalRanges as $normalRange){
                        $normalRange['sub_analysis_id'] = $subAnalysis->id;
                        NormalRange::create($normalRange);
                    }
                }
            }
        }
    }

    /**
     * @param $data
     * @param $mainAnalysis
     */
    public function update($data, $mainAnalysis){

        if(is_numeric($mainAnalysis)){
            $mainAnalysis =  MainAnalysis::findOrFail($mainAnalysis);
        }

        $subAnalysis = [];
        if(array_key_exists('sub_analysis', $data)){
            $subAnalysis = $data['sub_analysis'];
            unset($data['sub_analysis']);
        }


        $mainAnalysis->update($data);
        if(is_array($subAnalysis) && count($subAnalysis) > 0){
            $deletedSubIds = array_diff($mainAnalysis->subAnalysis->pluck('id')->toArray(), collect($subAnalysis)->pluck('id')->toArray());

            SubAnalysis::where('main_analysis_id',$mainAnalysis->id)->whereIn('id',$deletedSubIds)->delete();
            foreach($subAnalysis as $sub){
                $subId = $sub['id'];
                unset($sub['id']);
                $sub['main_analysis_id'] = $mainAnalysis->id;
                $normalRanges = $sub['normal_range'];
                unset($sub['normal_range']);


                if($subId == null || $subId ==''){
                    $sub_analysis = SubAnalysis::create($sub);

                    if (is_array($normalRanges) && count($normalRanges) > 0) {
                        foreach ($normalRanges as $normalRange) {
                            $normalRange['sub_analysis_id'] = $sub_analysis->id;
                            NormalRange::create($normalRange);
                        }
                    }
                }else{
                    $sub_analysis = SubAnalysis::find($subId);
                    $sub_analysis->update($sub);
                    $deletedNormalRange = array_diff($sub_analysis->normalRanges->pluck('id')->toArray(), collect($normalRanges)->pluck('id')->toArray());
                    $DeleteNormalRange = NormalRange::where('sub_analysis_id',$sub_analysis->id)->whereIn('id',$deletedNormalRange)->delete();

                    if(is_array($normalRanges) && count($normalRanges) > 0){

                        foreach ($normalRanges as $normalRange) {

                            $normalRange['sub_analysis_id'] = $sub_analysis->id;

                            if($normalRange['id'] == null || $normalRange['id'] === '' ){
                                NormalRange::create($normalRange);
                            }else{
                                if (!$DeleteNormalRange)
                                {
                                    NormalRange::findOrFail(intval($normalRange['id']))->update($normalRange);
                                }

                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $mainAnalysis
     * @return mixed
     */
    public function destroy($mainAnalysis){
        if(is_numeric($mainAnalysis)){
            $mainAnalysis = MainAnalysis::findOrFail($mainAnalysis);
        }
        return $mainAnalysis->delete();
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel(){
        $mainAnalysis = MainAnalysis::get()->map(function($mainAnalysis){
           return [
                '#' => $mainAnalysis->id,
                __("General name") => $mainAnalysis->general_name ,
                __("Abbreviated name") => $mainAnalysis->abbreviated_name ,
                __("Cost") => $mainAnalysis->cost ,
                __("Demand number") => $mainAnalysis->demand_no ,
                __("Order count") => 0 ,
                __("Created date") => $mainAnalysis->created_at ,
           ];
        });
     return (new \Rap2hpoutre\FastExcel\FastExcel($mainAnalysis))->download(__('Main analysis').'.xlsx');
    }
}
