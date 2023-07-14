<?php

namespace App\Http\Services\Dashboard;

use Illuminate\Support\Facades\Hash;
use App\Models\HomeVisit;

class HomeVisitService
{
    /**
     * @return array
     */
    public function index()
    {
        return getModelData(model: new HomeVisit());
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        HomeVisit::create($data);
    }


    /**
     * @param $data
     * @param $homeVisit
     */
    public function update($data, $homeVisit)
    {
        if (is_numeric($homeVisit)) {
            $homeVisit = HomeVisit::findOrFail($homeVisit);
            $homeVisit->update($data);
        } else {
            $homeVisit->update($data);
        }
    }


    // /**
    //  * @param $data
    //  * @param $homeVisit
    //  */
    // public function update($data, $homeVisit)
    // {
    //     if (is_numeric($homeVisit)) {
    //         $homeVisit = HomeVisit::findOrFail($homeVisit);
    //         $homeVisit->update($data);
    //     } else {
    //         $homeVisit->update($data);
    //     }
    // }

    /**
     * @param $homeVisit
     */
    public function delete($homeVisit)
    {
        if (is_numeric($homeVisit)) {
            $homeVisit = HomeVisit::findOrFail($homeVisit);
            $homeVisit->delete();
        } else {
            $homeVisit->delete();
        }
    }

    /**
     * @return string|\Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \OpenSpout\Common\Exception\IOException
     * @throws \OpenSpout\Common\Exception\InvalidArgumentException
     * @throws \OpenSpout\Common\Exception\UnsupportedTypeException
     * @throws \OpenSpout\Writer\Exception\WriterNotOpenedException
     */
    public function exportExcel()
    {
        $homeVisits = HomeVisit::get()->map(function ($homeVisit) {
            return [
                '#'              => $homeVisit->id,
                __("Name")       => $homeVisit->name,
                __("Address")    => $homeVisit->address,
                __("Phone")      => $homeVisit->phone,
                __("Email")      => $homeVisit->email,
                __("Gender")     => $homeVisit->gender,
                __("Date time")  => $homeVisit->date_time,
                __("Created at") => $homeVisit->created_at,
            ];
        });
        return (new \Rap2hpoutre\FastExcel\FastExcel($homeVisits))->download(__('Home visits') . '.xlsx');
    }

}
