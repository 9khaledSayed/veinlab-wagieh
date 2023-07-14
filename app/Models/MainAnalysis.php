<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainAnalysis extends Model
{
    use HasFactory,SoftDeletes;

    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];
    protected $table='main_analysis';
    protected $guarded = [];

    protected $appends = ['create_since'];

    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }


    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class,'hospital_main_analysis')->withPivot('price');
    }

    public function subAnalysis()
    {
        return $this->hasMany(SubAnalysis::class,'main_analysis_id')->with('normalRanges');
    }

    public function notes()
    {
        return $this->hasMany(Note::class,'main_analysis_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class,'package_main_analyze');
    }

    public function promocodes()
    {
        return $this->hasMany(PromoCode::class,'main_analysis_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class,'main_analysis_id');
    }

    public function waitinglabs()
    {
        return $this->hasMany(WaitingLab::class,'main_analysis_id');
    }

    public function laboratories()
    {
        return $this->belongsToMany(Laboratory::class,'laboratory_main_analysis')
            ->withPivot(['selling_price','cost_price']);
    }

    public function getInfo() : string {
        return $this->general_name . ' - ' . $this->price . ' SAR';
    }

}
