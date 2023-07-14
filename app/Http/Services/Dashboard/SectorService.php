<?php
namespace App\Http\Services\Dashboard;

use App\Models\Sector;

class SectorService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData( model: new Sector() );
    }

    /**
     * @param $data
     */
    public function store($data){
        $data['logo'] = uploadImage( $data['logo'] ,"Sectors");
        Sector::create($data);
    }

    /**
     * @param $data
     * @param $sector
     */
    public function update($data,$sector){

        if(is_numeric($sector)){
            $sector = Sector::findOrFail($sector);
        }
        if(isset($data['logo']) && is_file($data['logo'])){
            deleteImage($sector->logo, "Sectors");
            $data['logo'] = uploadImage( $data['logo'] ,"Sectors");
        }

        $sector->update($data);
    }

    /**
     * @param $sector
     */
    public function destroy($sector){
        if(is_numeric($sector)){
            $sector = Sector::findOrFail($sector);
        }
        $sector->delete();
    }

    /**
     * @return mixed
     */
    public function getAll() {
        return Sector::get();
    }
}
