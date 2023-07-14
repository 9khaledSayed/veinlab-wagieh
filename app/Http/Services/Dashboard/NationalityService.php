<?php

namespace App\Http\Services\Dashboard;

use App\Models\Nationality;

class NationalityService
{

    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Nationality() );
    }

    /**
     * @return mixed
     */
    public function getAll(){
        return Nationality::get();
    }

    /**
     * @param $data
     */
    public function store($data){
        $data['logo'] = uploadImage( $data['logo'] ,"Nationalities");
        Nationality::create($data);
    }

    /**
     * @param $data
     * @param $nationality
     */
    public function update($data,$nationality){
        if(is_numeric($nationality)){
            $nationality = Nationality::finOrFail($nationality);
        }

        if(isset($data['logo']) && is_file($data['logo'])){
            $data['logo'] = uploadImage( $data['logo'] ,"Nationalities");
        }else{
            $data['logo'] = $nationality->logo;
        }
        $nationality->update($data);
    }

    /**
     * @param $nationality
     */
    public function destroy($nationality){
        if (is_numeric($nationality)) {
            $nationality = Nationality::finOrFail($nationality);
        }
        $nationality->delete();
    }
}
