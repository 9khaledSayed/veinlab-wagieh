<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['created_at' => 'date:Y-m-d  h:i A', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    protected static function booted()
    {
        static::creating(function ($model){
            $model->employee_id = auth()->id();
            $model->barcode = substr(time(), -5) . mt_rand(0, 9);
            $model->serial_no = substr(time(), -10) . mt_rand(11, 99);
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function setMainAnalysisAttribute($value)
    {
        if (isset($value)){
            $this->attributes['main_analysis'] = serialize($value);
        }
    }


    public function getMainAnalysisAttribute()
      {
          if (isset($this->attributes['main_analysis'])){
              return unserialize($this->attributes['main_analysis']);
          }
          return [];
      }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function waitingLabs()
    {
        return $this->hasMany(WaitingLab::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
