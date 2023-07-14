<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];
    protected $appends = ['create_since'];
    
    
    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function subAnalysis()
    {
        return $this->belongsTo(SubAnalysis::class);
    }
    public function mainAnalysis()
    {
        return $this->belongsTo(MainAnalysis::class);
    }

    public function WaitingLab()
    {
        return $this->belongsTo(WaitingLab::class,'waiting_lab_id')->with('invoice');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

}
