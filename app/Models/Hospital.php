<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'hospital_id');
    }


    public function mainAnalysis()
    {
        return $this->belongsToMany(MainAnalysis::class,'hospital_main_analysis')->withPivot('price');
    }

    public function getLabel() : string{
        return $this->name;
    }
}
