<?php

namespace App\Http\Classes\Points;

use App\Enums\{MarketedCodeStatus, PointTypes, PromoCodeTypes};
use App\Models\{Marketer, Patient, PromoCode};

class AssignPoints extends CalculatePoints
{

    public CustomPoints $customPoints;

    public function __construct(private int $total, PromoCode $promoCode)
    {
        parent::__construct($promoCode);
        $this->customPoints = $this->clc($this->total);
    }

    public function toPatient(Patient $patient, $invoice_id){

        $patient->points()->create([
            'points' => $this->customPoints->userPoints,
            'key' => 'make_invoice',
            'type' => PointTypes::GAIN,
            'invoice_id' => $invoice_id,
        ]);
        //save this points in patient row
        $patient->total_points_count += $this->customPoints->userPoints;
        $patient->save();

        if ($this->promoCode->type == PromoCodeTypes::AFFILIATE){
            $marketer = Marketer::find($this->promoCode->marketer_id);
            $marketer->points()->create([
                'promo_code_id' => $this->promoCode->id,
                'patient_id' => $patient->id,
                'points' => $this->customPoints->marketerPoints,
            ]);
            $marketer->total_points_count += $this->customPoints->marketerPoints;

        }elseif ($this->promoCode->type == PromoCodeTypes::USER && $this->promoCode->user_id != $patient->id){

            $toPatient = Patient::find($this->promoCode->user_id);
            $toPatient->points()->create([
                'points' => $this->customPoints->marketerPoints,
                'key' => '',
                'type' => PointTypes::AFFILIATE,
                'description' => '',
                'another_patient_id' => $patient->id
            ]);

            $toPatient->total_points_count += $this->customPoints->marketerPoints;
            $toPatient->save();
        }


    }


    public static function minusPatient(int $points, Patient $patient, $invoice_id){
        $patient->points()->create([
            'points' => -$points,
            'key' => 'make_invoice',
            'type' => PointTypes::USED,
            'invoice_id' => $invoice_id,
        ]);
        $patient->total_points_count -= $points;
        $patient->save();
    }


}
