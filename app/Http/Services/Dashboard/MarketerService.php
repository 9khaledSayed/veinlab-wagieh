<?php

namespace App\Http\Services\Dashboard;

use App\Models\Marketer;

class MarketerService
{
    /**
     * @return array
     */
    public function index(){
        return getModelData(model: new Marketer());
    }

    /**
     * @param $data
     */
    public function store($data) : void{
        Marketer::create($data);
    }

    /**
     * @param Marketer $marketer
     */
    public function destroy(Marketer $marketer)
    {
        $marketer->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id){
        return Marketer::findOrFail($id);
    }

    /**
     * @param array $data
     * @param mixed $marketer
     */
    public function update(array $data, mixed $marketer)
    {
        if(is_numeric($marketer)){
            $marketer = $this->find($marketer);
        }
        $marketer->update($data);
    }

}
