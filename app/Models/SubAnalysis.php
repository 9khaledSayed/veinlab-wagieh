<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubAnalysis extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $table='sub_analysis';

    protected $guarded = [];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    public function mainAnalysis()
    {
        return $this->belongsTo(MainAnalysis::class,'main_analysis_id');
    }

    public function normalRanges()
    {
        return $this->hasMany(NormalRange::class,'sub_analysis_id');
    }

    public function result()
    {
        return $this->hasMany(Result::class,'sub_analysis_id');
    }

    public function spans($gender)
    {
        if(!isset($this->unit) && $this->normal($gender) == null){
            return 3;
        }elseif(!isset($this->unit) || !$this->normal($gender)){
            return 2;
        }else{
            return 1;
        }
    }


    public function getAttributeUnit()
    {
        $unit = $this->attributes['unit'];
        $power = "";
        if (strpos($unit, '^') != false){
            $parts = explode('^', $unit);
            $numbersAfterCarrot = array_filter(preg_split("/\D+/", $parts[1]));

            if (count($numbersAfterCarrot) > 0){
                $power = $numbersAfterCarrot[0];
            }

            $prefix = $parts[0];
            $suffix = str_replace($power, "", $parts[1]);

            return "<span>$prefix<sup>$power</sup>$suffix</span>";
        }

        return $unit;
    }

    public function normal($gender)
    {
        $normalRanges = $this->normalRanges;
        if($normalRanges->count() > 0){
            $normal = $normalRanges->whereIn('gender', [$gender, 3])->first();
            return $normal ? $normal->value: '';
        }else{
            return null;
        }

    }

    public function ReturnTypeNormal($gender)
    {
        $normalRanges = $this->normalRanges;
        if($normalRanges->count() > 0){
            $normal = $normalRanges->whereIn('gender', [$gender, 3])->first();
            return $normal ? $normal->type: '';
        }else{
            return null;
        }

    }

}
