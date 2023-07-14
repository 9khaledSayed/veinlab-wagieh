<?php

namespace App\Http\Services\Dashboard;

use App\Models\Hospital;
use Illuminate\Support\Facades\Hash;

class HospitalServices
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData(model: new Hospital());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Hospital::findOrFail($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data) : bool
    {

        $mainAnalyses = [];
        if (array_key_exists('main_analysis', $data)) {
            $mainAnalyses = $data['main_analysis'];
            unset($data['main_analysis']);
        }
        $data['password'] = Hash::make($data['password']);

        $hospital = Hospital::create($data);
        foreach ($mainAnalyses as $mainAnalysis) {
            $hospital->mainAnalysis()->attach($mainAnalysis['id'], ['price' => $mainAnalysis['price']]);

        }
        return true;
    }

    /**
     * @param Hospital $hospital
     * @return mixed
     */
    public function getMainAnalysis(Hospital $hospital)
    {
        return $hospital->mainAnalysis->map(function ($main) {
            return [
                'id'    => $main->id,
                'price' => $main->pivot->price,
            ];
        });
    }

    /**
     * @param $data
     * @param $hospital
     */
    public function update($data, $hospital)
    {
        if (is_numeric($hospital)) {
            $hospital = Hospital::findOrFail($hospital);
        }
        $mainAnalyses = [];

        if (array_key_exists('main_analysis', $data)) {
            $mainAnalyses = $data['main_analysis'];
            unset($data['main_analysis']);
        }

        if (!isset($data['password'])) {
            unset($data['password']);
        }
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $hospital->update($data);
        $hospital->mainAnalysis()->detach();
        foreach ($mainAnalyses as $mainAnalysis) {
            $hospital->mainAnalysis()->attach([$mainAnalysis['id'] => ['price' => $mainAnalysis['price']]]);
        }
    }

    /**
     * @param $hospital
     */
    public function destroy($hospital)
    {
        if (is_numeric($hospital)) {
            $hospital = Hospital::findOrFail($hospital);
            $hospital->delete();
        } else {
            $hospital->delete();
        }
    }

    /**
     * @param int $model
     * @return Hospital
     */
    public function getModelById(int $model) : Hospital
    {
        return Hospital::findOrFail($model);
    }

    /**
     * @return Hospital[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Hospital::all();
    }
}
