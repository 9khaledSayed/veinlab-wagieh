<?php

namespace App\Http\Services\Dashboard;

use App\Models\Quality;

class QualityService
{
    /**
     * @param $data
     */
    public function store($data){
        Quality::create($data);
    }
}
